<?php

namespace Vanguard\Repositories\Maintenance;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Maintenance;
use Vanguard\Model\Inventory;

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
            if(count($item) < 12){
                continue;
            }
            $id = explode(' ', $item['2']);

            array_push($insert_data,[          
                'type_id'=>(int)$id[0],       
                'equipment_id'=>(int)$id[1],
                'supplier_id'=>$item['7'],
                'staff_id'=>$item['8'],
                'inventory_id'=>$item['1'],
                'service'=>$item['3'],
                'quantity'=>$item['4'],
                'unit_price'=>$item['5'],
                'amount'=>$item['6'],
                'note'=>$item['9'],
                'image_broken'=>$item['10'],
                'image_replace'=>$item['11'],
                'date'=>$this->getDate($item['0']),
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }

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
        return $create;
    }

    public function findByKey($key)
    {
        return Maintenance::whereBetween('date', [$key[0], $key[1]])->orderBy('date', $key[2])->get();
    }

    public function find($id)
    {
        return Maintenance::find($id);
    } 

    public function update($id, array $data)
    {
        $now = Carbon::now(); 
        
        $eq_id = explode(' ', $data['equipment_id']);

        $edit = [          
                'type_id'=>(int)$eq_id[0],       
                'equipment_id'=>(int)$eq_id[1],
                'supplier_id'=>$data['supplier_id'],
                'staff_id'=>$data['staff_id'],
                'inventory_id'=>$data['type_id'],
                'service'=>$data['service'],
                'quantity'=>$data['quantity'],
                'unit_price'=>$data['unit_price'],
                'amount'=>$data['amount'],
                'note'=>$data['note'],
                //'image_broken'=>$data['equipment_id'],
                //'image_replace'=>$data['equipment_id'],
                'date'=>$this->getDate($data['date']),
                'updated_at'=>$now
        ];

        return Maintenance::find($id)->update($edit);
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
}