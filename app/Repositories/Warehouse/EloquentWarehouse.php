<?php

namespace Vanguard\Repositories\Warehouse;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Warehouse;

class EloquentWarehouse implements WarehouseRepository
{ 

    public function paginate($perPage, $search = null)
    {   
        $query = Warehouse::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', "like", "%{$search}%");
               
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
        return Warehouse::all();
    }

    public function find($id)
    {
        return Warehouse::find($id);
    }

    public function create(array $data)
    {   
        return Warehouse::create($data);
    }

    public function update($id, array $data)
    {
        return Warehouse::find($id)->update($data);
    }

    public function delete($id)
    {
        return Warehouse::find($id)->delete();
    }
}