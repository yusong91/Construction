<?php

namespace Vanguard\Repositories\Sparepart;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Sparepart;
use Vanguard\Model\Inventory;
use Vanguard\Model\Maintenance;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;

class EloquentSparepart implements SparepartRepository
{ 
    public function paginate($perPage, $search = null) 
    {   
        $query = Sparepart::query()->with(['parent_maintenance', 'parent_maintenance.parent_equipment']); 
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
        return Sparepart::all();
    }
 
    public function find($id)
    {
        return Sparepart::find($id);
    } 
    
    public function update($id, array $data)
    {
        $update = Sparepart::find($id);
        $maintenance_id = $update->maintenance_id;
        $update->name = $data['name'];
        $update->quantity = $data['quantity'];
        $update->unit = $data['unit'];
        $update->unit_price = $data['unit_price'];
        $update->amount = $data['quantity'] * $data['unit_price'];
        $update->save();

        $update_maintenance = Maintenance::find($maintenance_id);
        $update_maintenance->quantity = $data['quantity'];
        $update_maintenance->unit = $data['unit'];
        $update_maintenance->unit_price = $data['unit_price'];
        $update_maintenance->amount = $data['quantity'] * $data['unit_price'];
        $update_maintenance->save();

        return $update;
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