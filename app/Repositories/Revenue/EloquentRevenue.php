<?php

namespace Vanguard\Repositories\Revenue;

use Carbon\Carbon;
use Validator;
use DB;
use Vanguard\Model\Revenue;

class EloquentRevenue implements RevenueRepository
{ 
 
    public function paginate($perPage, $search = null)
    {   
        $query = Revenue::query()->with('parent_equipment')->with('parent_customer');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('equipment_id', "like", "%{$search}%");
                $q->orWhere('customer_name', 'like', "%{$search}%");
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
        return Revenue::with(['parent_equipment', 'parent_customer'])->get();
    }

    public function findByKey($key)
    {
        return Revenue::where('from_date', '>=', $key[0])->where('to_date', '<=', $key[1])->orderBy('from_date', $key[2])->get()->groupBy(function($date) {
            return Carbon::parse($date->from_date)->format('Y-m-d');
        });
    }

    public function find($id)
    {
        return Revenue::find($id);
    }

    public function create(array $data)
    {   
        $now = Carbon::now(); 
        $insert_data = []; 
        foreach($data as $item)
        {
            if(count($item) < 5){
                continue; 
            }

            dd($item);

            $digital_file = "";
            if(isset($item['8'])) 
            { 
                $file = $item['8'];
                $digital_file = Storage::putFile('img', $file) ?? "";
            }

            $id = explode(' ', $item['2']);

            array_push($insert_data,[          
                'type_id'=>(int)$id[0],       
                'equipment_id'=>(int)$id[1],
                'customer_id'=>$item['0'],
                'customer_name'=>$item['1'],
                'from_date'=>$this->getDate($item['3']),
                'to_date'=>$this->getDate($item['4']),

                'number_working_day'=>$item['5'],
                'rent_price'=>$item['6'],
                'amount'=>$item['5'] * $item['6'],
                'note'=>$item['7'] ?? "",
                'file'=>$digital_file,
                'created_at'=>$now, 
                'updated_at'=>$now
            ]);            
        }
        return DB::table('revenues')->insert($insert_data);
    }

    public function update($id, array $data)
    {
        $eq_id = explode(' ', $data['equipment_id']);

        $edit = ['type_id'=>$eq_id[0], 'equipment_id'=>$eq_id[1], 'customer_id'=>$data['customer_id'], 'customer_name'=>$data['customer_name'], 'from_date'=>$this->getDate($data['from_date']), 'to_date'=>$this->getDate($data['to_date']), 'number_working_day'=>$data['work_day'], 'rent_price'=>$data['rental_price'], 'amount'=>$data['amount'], 'note'=>$data['note']];

        return Revenue::find($id)->update($edit);
    }

    public function delete($id)
    {
        $data = Revenue::find($id);

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