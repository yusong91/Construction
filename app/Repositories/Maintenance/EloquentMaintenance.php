<?php

namespace Vanguard\Repositories\Maintenance;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Maintenance;
use Vanguard\Model\Inventory;
use Vanguard\Model\Sparepart;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;
 
class EloquentMaintenance implements MaintenanceRepository
{ 
    public function paginate($perPage, $search = null)
    {   
        $query = Maintenance::query()->with(['parent_inventory', 'parent_equipment', 'parent_supplier', 'parent_staff']); 
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('service', "like", "%{$search}%");
                $q->orWhere('note', 'like', "%{$search}%");
            }); 
        } 
        $result = $query->orderBy('created_at', 'desc')->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }
        return $result;
    }

    public function all() 
    {
        return Maintenance::with(['parent_equipment', 'parent_inventory', 'parent_supplier', 'parent_staff'])->get();
    }
 
    public function create(array $data)
    {   
        $now = Carbon::now(); 
        $insert_data = []; 
        
        foreach($data as $item)
        {
            if($item[0] == "new_spare_part" || $item[0] == "service")
            {
                $digital_invoice = "";
                $digital_broken = "";
                $digital_replace = "";

                if(isset($item['11'])) 
                { 
                    $file = $item['11'];
                    $digital_invoice = Storage::putFile('img', $file) ?? "";
                }

                if(isset($item[12])) 
                { 
                    $file = $item['12'];
                    $digital_broken = Storage::putFile('img', $file) ?? "";
                }

                if(isset($item[13])) 
                { 
                    $file = $item['13'];
                    $digital_replace = Storage::putFile('img', $file) ?? "";
                }

                $id = explode(' ', $item[2]);

                $quantity = $item[5] ?? 0;
                $unit_price = $item[7] ?? 0;
 
                $insert_data = [
                    'type'=>$item[0],          
                    'type_id'=>(int)$id[0],       
                    'equipment_id'=>(int)$id[1],
                    'supplier_id'=>$item[3], 
                    'staff_id'=>$item[4],
                    'inventory_id'=>null,
                    'service'=>$item[1],
                    'quantity'=>$item[5],
                    'unit'=>$item[6],
                    'unit_price'=>$item[7],
                    'amount'=>$quantity * $unit_price,
                    'invoice_number'=>$item[9],
                    'invoice_file'=>$digital_invoice,
                    'note'=>$item[10] ?? "",
                    'image_broken'=>$digital_broken,
                    'image_replace'=>$digital_replace,
                    'date'=>$this->getDate($item[8]), 
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]; 

                $create = Maintenance::create($insert_data);

                if($create)
                {
                    $q = $create->quantity;
                    $unit_price = $create->unit_price;
                    $insert = [];

                    array_push($insert,[
                        'maintenance_id'=>$create->id,          
                        'name'=>$create->service,       
                        'quantity'=>$q,
                        'unit'=>$create->unit, 
                        'unit_price'=> $unit_price,
                        'amount'=> $q * $unit_price,
                        'created_at'=>$now,
                        'updated_at'=>$now
                    ]); 

                    DB::table('spareparts')->insert($insert);
                }

            } elseif($item[0] == "inventory"){
                
                $id = explode(' ', $item[3]);

                $digital_broken = "";
                $digital_replace = "";

                if(isset($item[9])) 
                { 
                    $file = $item[9];
                    $digital_broken = Storage::putFile('img', $file) ?? "";
                }

                if(isset($item[10])) 
                { 
                    $file = $item[10];
                    $digital_replace = Storage::putFile('img', $file) ?? "";
                } 

                array_push($insert_data,[
                    'type'=>$item[0],          
                    'type_id'=>$id[0],       
                    'equipment_id'=>$id[1],
                    'supplier_id'=>$item[4],
                    'staff_id'=>$item[5],
                    'inventory_id'=>$item[2],
                    'quantity'=>$item[6],
                    'note'=>$item[8] ?? "",
                    'image_broken'=>$digital_broken,
                    'image_replace'=>$digital_replace,
                    'date'=>$this->getDate($item[7]),
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);  

                $create = DB::table('maintenances')->insert($insert_data);

                if($create)
                {
                    foreach($insert_data as $insert) 
                    {
                        $inventory = Inventory::find($insert['inventory_id']);
                        $inventory->used = (int)$item['4'];
                        $inventory->save();
                    }
                }
            }             
        }
        return true;
    }

    public function findByKey($key)
    {
        return Maintenance::whereBetween('date', [$key[0], $key[1]])->get()->groupBy(function($date) {
            return Carbon::parse($date->date)->format('Y-m-d');
        });
    }

    public function find($id)
    {
        return Maintenance::find($id);
    } 

    public function update($id, array $data)
    {
        $category_id = $data['category_id'];
        
        $now = Carbon::now(); 
        
        $eq_id = explode(' ', $data['equipment_id']);

        $invoice_file = "";
        $digital_broken = "";
        $digital_replace = "";

        if(isset($data['invoice_file'])) 
        { 
            $file = $data['invoice_file'];
            $invoice_file = Storage::putFile('img', $file);
        }

        if(isset($data['image_broken'])) 
        { 
            $file = $data['image_broken'];
            $digital_broken = Storage::putFile('img', $file);
        }

        if(isset($data['image_replace'])) 
        { 
            $file = $data['image_replace'];
            $digital_replace = Storage::putFile('img', $file);
        }

        $edit =  Maintenance::find($id);

        $amount = null;
        $unit = null;
        $unit_price = null;
        $invoice_number = null;
        $invoice_file = null;

        switch ($category_id) {
            case 'new_spare_part':
                $unit = $data['unit'] ?? $edit->unit;
                $invoice_number = $data['invoice_number'] ?? $edit->invoice_number;
                $unit_price = $data['unit_price'] ?? $edit->unit_price;
                $quantity = $data['quantity'] ?? $edit->quantity;
                $amount = $quantity * $unit_price;
                break;
            case 'inventory':
                $amount = null;
                $unit = null;
                $unit_price = null;
                $invoice_number = null;
                $invoice_file = null;
                break;
            case 'service':
                $unit = $data['unit'] ?? $edit->unit;
                $invoice_number = $data['invoice_number'] ?? $edit->invoice_number;
                $unit_price = $data['unit_price'] ?? $edit->unit_price;
                $quantity = $data['quantity'] ?? $edit->quantity;
                $amount = $quantity * $unit_price;
                break;
            default:
                '';
                break;
        }

        // if(isset($data['quantity']) && isset($data['unit_price']))
        // {
        //     $amount = $data['unit_price'] * $data['quantity'];
        // }

        $update = [           
                'type'=>$data['category_id'],          
                'type_id'=>$eq_id[0],       
                'equipment_id'=>$eq_id[1],
                'supplier_id'=>$data['supplier_id'],
                'staff_id'=>$data['staff_id'],
                'inventory_id'=>$data['inventory_id'] ?? $edit->inventory_id,
                'service'=>$data['service_name'] ?? $edit->service,
                'quantity'=>$data['quantity'] ?? $edit->quantity,
                'unit'=>$unit,
                'unit_price'=>$unit_price,
                'amount'=>$amount,
                'invoice_number'=>$invoice_number,
                'invoice_file'=>$invoice_file,
                'note'=>$data['note'] ?? "",
                'image_broken'=>$digital_broken ?? $edit->image_broken,
                'image_replace'=>$digital_replace ?? $edit->image_replace,
                'date'=> isset($data['date']) ? $this->getDate($data['date']) : $edit->date,
                'updated_at'=>$now
        ]; 
        
        $updated = $edit->update($update);

        if($updated)
        {
            $update_sparepart = Sparepart::where('maintenance_id', $id)->first();
            $update_sparepart->name = $data['service'] ?? $edit->service;
            $update_sparepart->quantity = $data['quantity'] ?? $edit->quantity;
            $update_sparepart->unit = $data['unit'] ?? $edit->unit;
            $update_sparepart->unit_price = $data['unit_price'] ?? $edit->unit_price;
            $update_sparepart->amount = $amount ?? $edit->amount;
            $update_sparepart->save();
        }
        return $updated;
    }

    public function delete($id)
    {
        return Maintenance::find($id)->delete();
    }

    public function getDate($data){

        if(is_null($data)){
            return null;
        }

        $time = strtotime(str_replace('/', '-', $data));
        $newformat = date('Y-m-d', $time);
        return $newformat;
    }

    public function getMaintenanceByDate($date_from, $date_to)
    {
        return Maintenance::with(['parent_inventory', 'sparepart_children'])->get(); //'inventory_child', 
    }
}