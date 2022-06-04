<?php
 
namespace Vanguard\Repositories\Customer;

use Vanguard\Model\Customer;
use Vanguard\Model\Equipment;
use DB;
use Carbon\Carbon;
use Illuminate\Database\SQLiteConnection; 

class EloquentCustomer implements CustomerRepository
{ 
    //->with('child_revenue')->with('child_revenue.parent_equipment')->with('child_revenue.parent_equipment.revenue_parent_quipment')
    public function paginate($perPage, $search = null)
    {   
        $query = Customer::query();

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
            if($item[0] == null || $item[2] == null){
                continue;
            }
            array_push($insert_data,[                 
                'company_name'=>$item[0],
                'customer_name'=>$item[1],
                'customer_phone'=>$item[2],
                'email'=>$item[3],
                'job'=>$item[4],
                'address'=>$item[5],
                'other'=>$item[6],
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