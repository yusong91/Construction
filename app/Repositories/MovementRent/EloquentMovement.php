<?php

namespace Vanguard\Repositories\MovementRent;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\MovementRent;

class EloquentMovement implements MovementRepository
{ 
    public function paginate($perPage, $search = null)
    {   
        $query = MovementRent::query()->with('parent_type')->with('parent_equipment')->with('parent_customer');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('equipment_id', "like", "%{$search}%");
                $q->orWhere('sale_to', 'like', "%{$search}%");
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
        return MovementRent::all();
    }

    public function create(array $data)
    {   
        $now = Carbon::now(); 
        $insert_data = []; 
        foreach($data as $item)
        {
            
            if($item[0] == null){
                continue;
            }
            $id = explode(' ', $item[0]);
            
            array_push($insert_data,[          
                'type_id'=>$id[0],       
                'equipment_id'=>$id[1],
                'customer_id'=>$item[1],
                'customer_name'=>$item[2],
                'customer_phone'=>$item[3],
                'date'=>$this->getDate($item[4]),
                'from_location'=>$item[5],
                'to_location'=>$item[6],
                'expected_date'=>$item[7],
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }
        return DB::table('movement_rents')->insert($insert_data);
    }

    public function find($id)
    {
        return MovementRent::find($id);
    }

    public function update($id, array $data)
    {
        $eq_id = explode(' ', $data['equipment_id']);

        $edit = ['type_id'=>$eq_id[0], 'equipment_id'=>$eq_id[1], 'customer_id'=>$data['customer_id'], 'customer_name'=>$data['customer_name'], 'customer_phone'=>$data['customer_phone'], 'date'=>$this->getDate($data['date']), 'from_location'=>$data['from_location'], 'to_location'=>$data['to_location'], 'expected_date'=>$data['expected_date']];

        return MovementRent::find($id)->update($edit);
    }

    public function delete($id)
    {
        return MovementRent::find($id)->delete();
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