<?php
 
namespace Vanguard\Repositories\Unclaim;
use Vanguard\Model\Maintenance;
use Carbon\Carbon;
use Validator;
use DB;
 
class EloquentUnclaim implements UnclaimRepository
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
        return Maintenance::with('parent_staff')->where('unclaim', 0)->get();
    } 

    public function create(array $data)
    {   
        
        
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