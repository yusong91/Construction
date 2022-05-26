<?php

namespace Vanguard\Repositories\Sparepart;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Sparepart;
use Vanguard\Model\Inventory;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;

class EloquentSparepart implements SparepartRepository
{ 
    public function paginate($perPage, $search = null)
    {   
        $query = Sparepart::query(); 
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
        return Sparepart::with(['parent_equipment', 'parent_inventory', 'parent_supplier', 'parent_staff'])->get();
    }
 

    public function find($id)
    {
        return Sparepart::find($id);
    } 

    public function update($id, array $data)
    {
        $now = Carbon::now(); 
        
        $eq_id = explode(' ', $data['equipment_id']);

        $digital_broken = "";
        $digital_replace = "";

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

        $update = [          
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
                'image_broken'=>$digital_broken ? $digital_broken : $edit->image_broken ,
                'image_replace'=>$digital_replace ? $digital_replace : $edit->image_replace,
                'date'=>$this->getDate($data['date']),
                'updated_at'=>$now
        ]; 
        
        return $edit->update($update);
    }

    public function delete($id)
    {
        return Sparepart::find($id)->delete();
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