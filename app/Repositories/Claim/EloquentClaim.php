<?php
 
namespace Vanguard\Repositories\Claim;
use Vanguard\Model\Maintenance;
use Vanguard\Model\Claim;
use Carbon\Carbon;
use Validator;
use DB;
 
class EloquentClaim implements ClaimRepository
{  
    public function paginate($perPage, $search = null)
    {   
        $query = Maintenance::query()->with(['parent_inventory', 'parent_equipment', 'parent_supplier', 'parent_staff']); 
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
        return Maintenance::with('parent_staff')->where('unclaim', 1)->get();
    } 

    public function create(array $data)
    {  
        
        $create = Unclaim::create($data);
        if($create)
        {
            $id = $data['maintenance_id'];
            $maintenance = Maintenance::find($id);
            $maintenance->unclaim = 1;
            $maintenance->save();
        }
        return $create;
    }

    public function find($id) 
    {
        return Maintenance::find($id);
    }

    public function update($id, array $data)
    {
        return Maintenance::find($id)->update($data);
    } 

    public function delete($id)
    {
        
    }

}