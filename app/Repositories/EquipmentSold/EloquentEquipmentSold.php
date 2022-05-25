<?php

namespace Vanguard\Repositories\EquipmentSold;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\EquipmentSold;
use Vanguard\Model\Equipment;

class EloquentEquipmentSold implements EquipmentSoldRepository
{ 

    public function paginate($perPage, $search = null)
    {   
        $query = EquipmentSold::query()->with('parent_equipment')->with('parent_type');
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
        return EquipmentSold::all();
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
            $id = explode(' ', $item['0']);

            array_push($insert_data,[          
                'type_id'=>(int)$id[0],       
                'equipment_id'=>(int)$id[1],
                'sale_description'=>$item['1'],
                'sale_date'=>$this->getDate($item['2']),
                'sale_price'=>$item['3'],
                'sale_to'=>$item['4'],
                'note'=>$item['5'],
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }

        $create = DB::table('equipment_solds')->insert($insert_data);

        if($create)
        {
            foreach($insert_data as $sold)
            {
                $equipment = Equipment::find($sold['equipment_id']);
                $equipment->sold = 1;
                $equipment->save();
            }
        }

        return $create;
    }

    public function find($id)
    {
        return EquipmentSold::find($id);
    }

    public function update($id, array $data)
    {
        $eq_id = explode(' ', $data['equipment_id']);

        $edit = ['type_id'=>$eq_id[0], 'equipment_id'=>$eq_id[1], 'sale_description'=>$data['sale_description'], 'sale_date'=>$this->getDate($data['sale_date']), 'sale_price'=>$data['sale_price'], 'sale_to'=>$data['sale_to'], 'note'=>$data['note']];

        return EquipmentSold::find($id)->update($edit);
    }

    public function delete($id) 
    {
        $data = EquipmentSold::find($id);

        return $data->delete();
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