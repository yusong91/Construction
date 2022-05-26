<?php
 
namespace Vanguard\Repositories\Supplier;
use Vanguard\Model\Supplier;
use Carbon\Carbon;
use Validator;
use DB;
 
class EloquentSupplier implements SupplierRepository
{  
    public function paginate($perPage, $search = null)
    {   
        $query = Supplier::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('company_name', "like", "%{$search}%");
                $q->orWhere('supplier_name', 'like', "%{$search}%");
                $q->orWhere('phone', 'like', "%{$search}%"); 
                $q->orWhere('email', 'like', "%{$search}%");
                $q->orWhere('job', 'like', "%{$search}%");
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
        return Supplier::all();
    } 

    public function create(array $data)
    {   
        
        $now = Carbon::now(); 
        $insert_data = [];
        foreach($data as $item) 
        {
            if($item[2] == null){
                continue;
            }
            array_push($insert_data,[                 
                'company_name'=>$item['0'],
                'supplier_name'=>$item['1'],
                'phone'=>$item['2'],
                'email'=>$item['3'],
                'job'=>$item['4'],
                'address'=>$item['5'],
                'other'=>$item['6'],
                'note'=>$item['7'],
                'created_at'=>$now,
                'updated_at'=>$now
            ]);            
        }
        
        return DB::table('suppliers')->insert($insert_data);
    }

    public function find($id) 
    {
        return Supplier::find($id);
    }

    public function update($id, array $data)
    {
        return Supplier::find($id)->update($data);
    } 

    public function delete($id)
    {
        return Supplier::find($id)->delete();
    }

}