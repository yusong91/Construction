<?php
 
namespace Vanguard\Repositories\Customer;

use Vanguard\Model\Customer;
use Vanguard\Model\Equipment;
use DB;
use Carbon\Carbon;
use Illuminate\Database\SQLiteConnection;

class EloquentCustomer implements CustomerRepository
{ 

    public function paginate($perPage, $search = null)
    {   
        $query = Customer::query()->with('child_revenue');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('company_name', "like", "%{$search}%");
                $q->orWhere('customer_name', 'like', "%{$search}%");
                $q->orWhere('customer_phone', 'like', "%{$search}%"); 
            });
        } 
        $result = $query->orderBy('created_at', 'desc')->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }

        foreach($result as $items)
        {
            foreach($items->child_revenue as $item)
            {
                $equipment = Equipment::where('id', $item['equipment_id'])->with('parent_quipment')->get();
                
                $item->setAttribute('equipment', $equipment);

                //dd(gettype($item));
            }
        }
       
        return $result;
    }

    public function all() 
    {
        return Customer::all();
    }

    public function create(array $data)
    {
        $now = Carbon::now(); 
        $insert_data = [];
        foreach($data as $item)
        {
            if(count($item) < 7){
                continue;
            }
            array_push($insert_data,[                 
                'company_name'=>$item['0'],
                'customer_name'=>$item['1'],
                'customer_phone'=>$item['2'],
                'email'=>$item['3'],
                'job'=>$item['4'],
                'address'=>(int)$item['5'],
                'other'=>$item['6'],
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }
        return DB::table('customers')->insert($insert_data);
    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function update($id, array $data)
    {
        return Customer::find($id)->update($data);
    }

    public function delete($id)
    {
        return Customer::find($id)->delete();
    }

}