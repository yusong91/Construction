<?php

namespace Vanguard\Repositories\Equipment;

use Vanguard\Model\Equipment;
use Vanguard\Model\CommonCode;
use DB;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Storage;


class EloquentEquipment implements EquipmentRepository
{ 

    public function paginateList($id, $perPage, $search = null)
    {
        // ->whereHas('wristband_last', function($q){
        //     $now = Carbon::now();
        //     $past = Carbon::parse($now)->subMinute(30);
        //     $q->where('updated_at', '>', $past);
        // })

        $query = Equipment::query()->where('sold', 0)->with(['parent_brand', 'parent_quipment'])->where('equip_type_id', $id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('equipment_id', "like", "%{$search}%");
                $q->orWhere('chassis_no', 'like', "%{$search}%");
            });
        } 

        $result = $query->orderBy('created_at', 'desc')->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }
        return $result;
    }  
  
    public function paginate($perPage, $search = null)
    {
        //

        $query = CommonCode::with('children')->where('key', 'equipment_type');

        // ->whereHas('children', function($q){ 
        //             $q->where('key', '==', 'equipment_type');
        //         }); 
        
        if ($search) {
            $query->Where(function ($q) use ($search) {
                $q->orWhere('key', "like", "%{$search}%");
                $q->orWhere('value', "like", "%{$search}%");
                
            });
        } 
  
        $result = $query->orderBy('created_at', 'desc')->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }


        $equipments = [];

        foreach($result as $items) 
        {
            foreach($items->children as $item)
            {
                //dd('child');
                $child = DB::table('equipment')->where(['equip_type_id'=> $item->id, 'sold'=>0])->get();
                $count = DB::table('equipment')->where(['equip_type_id'=> $item->id, 'sold'=>1])->count();

                array_push($equipments, [ 
                    'id'=>$item->id,
                    'key'=>$item->key,
                    'value'=>$item->value,
                    'image'=>$item->image,
                    'parent_id'=>$item->parent_id,
                    'child_qeuipment'=>$child,
                    'soldout'=>$count
                ]);
            }

        }

        return $equipments;
    }

    public function create($type_id, array $data)
    {   
        $now = Carbon::now();
        $insert_data = [];

        foreach($data as $item)
        {
            if(count($item) == 1 || $item[1] == null){ 
                
                continue;
            }
           
            $digital_file = "";
            if(isset($item[11])) 
            { 
                $file = $item[11];
                $digital_file = Storage::putFile('img', $file);
            } 

            array_push($insert_data,[                 
                'equip_type_id'=>$type_id,
                'equipment_id'=>$item[0],
                'brand_id'=>$item[1],
                'chassis_no'=>$item[5],
                'engine_no'=>$item[6],
                'historical_cost'=>$item[2],
                'purchase_date'=> $this->getDate($item[3]) ?? null,
                'weight'=>$item[7],
                'year'=>$item[8],
                'receipt_no'=>$item[9],
                'vender'=>$item[4],
                'note'=>$item[10],
                'image'=>$digital_file,
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }
        return DB::table('equipment')->insert($insert_data);
    }

    public function update($id, array $data)
    {
        $now = Carbon::now();
       
        $digital_file = "";
        if(isset($data['image'])) 
        { 
            $file = $data['image'];
            $digital_file = Storage::putFile('img', $file);
        } 

        $insert_data =[                 
            'equip_type_id'=>$data['equip_type_id'],
            'equipment_id'=>$data['equipment_id'],
            'brand_id'=>$data['brand_id'],
            'chassis_no'=>$data['chassis_no'],
            'engine_no'=>$data['engine_no'],
            'historical_cost'=>$data['historical_cost'],
            'purchase_date'=>$this->getDate($data['purchased_date']), 
            'weight'=>$data['weight'],
            'year'=>$data['year'],
            'receipt_no'=>$data['receipt_no'],
            'vender'=>$data['vender'],
            'note'=>$data['note'],
            'image'=>$digital_file,
            'updated_at'=>$now
        ];            
        
        return Equipment::find($id)->update($insert_data);
    } 

    public function delete($id)
    {
        $data = Equipment::find($id);

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
 
    public function find($id)
    {
        return Equipment::find($id);
    } 

    public function outstanding($key) 
    {
        return Equipment::where('sold', $key)->with(['parent_quipment', 'parent_brand'])->get();
    }

    public function all()
    {
        return Equipment::with(['parent_brand', 'parent_quipment'])->where('sold',0)->get();
    }

    //     ->whereHas('children_equipment', function($q){
            
        //         $q->where('sold', '!=', 0);
            
        //     });
        
        
        // ->with(['children_equipment' => function ($query) {

        //     $query->where('sold', '==', 1);

        // }]);

        // $query->whereHas('children', function($q) use ($search) {

        //     $q->where('sold', 0); 
        
        // });


}