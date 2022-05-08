<?php

namespace Vanguard\Repositories\Inventory;

use Vanguard\Model\Inventory;
use DB;
use Carbon\Carbon;
use Illuminate\Database\SQLiteConnection;

class EloquentInventory implements InventoryRepository
{ 

    public function paginate($perPage, $search = null)
    {   
        $query = Inventory::query()->with(['parent_sparepart', 'parent_warehouse']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', "like", "%{$search}%");
                $q->orWhere('menufacture', 'like', "%{$search}%");
                $q->orWhere('vender', 'like', "%{$search}%"); 
                
            });
        } 
        
        //->with(['symptom','hospital','sex','getProvince', 'health'])
        $result = $query->orderBy('created_at', 'desc')->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }

        return $result;
    }

    public function all()  
    {
        return Inventory::all(); 
    } 

    public function create($spare_id, array $data)
    {   
        $now = Carbon::now(); 
        $insert_data = [];
        foreach($data as $item)
        {
            if(count($item) < 10){
                continue;
            }
            
            $digital_file = "";
            if(isset($item['9'])) 
            { 
                $file = $item['9'];
                $digital_file = Storage::putFile('img', $file);
            }

            array_push($insert_data,[                 
                'name'=>$item['0'],
                'sparep_id'=>$spare_id,
                'menufacture'=>$item['1'],
                'vender'=>$item['2'],
                'quantity'=>$item['3'],
                'unit'=>$item['4'],
                'price'=>(int)$item['5'],
                'purchased_date'=>$this->getDate($item['6']),
                'warehouse_id'=>$item['7'],
                'note'=>$item['8'],
                'image'=>$digital_file,
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }
        return DB::table('inventorys')->insert($insert_data);
    }

    public function find($id)
    {
        return Inventory::find($id);
    }

    public function update($id, array $data)
    {
        $now = Carbon::now(); 
        $purchased_date = $this->getDate($data['purchased_date']);
         
        $digital_file = "";
        if(isset($data['image'])) 
        { 
            $file = $data['image'];
            $digital_file = Storage::putFile('img', $file);
        }

        $edit = Inventory::find($id);

        $insert_data =[                 
            'name'=>$data['name'],
            'sparep_id'=>$data['spare_id'],
            'menufacture'=>$data['menufacture'],
            'vender'=>$data['vender'],
            'quantity'=>$data['quantity'],
            'unit'=>$data['unit'],
            'price'=>$data['price'],
            'purchased_date'=>$purchased_date,
            'warehouse_id'=>$data['warehouse_id'],
            'note'=>$data['note'],
            'image'=>$digital_file ? $digital_file  : $edit->image,
            'updated_at'=>$now
        ];            
        
        return $edit->update($insert_data);
    }

    public function delete($id)
    {
        return Inventory::find($id)->delete();
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