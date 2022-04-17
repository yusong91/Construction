<?php
 
namespace Vanguard\Repositories\Staff;
use Vanguard\Model\Staff;
use Carbon\Carbon;
use Validator;
use DB;

class EloquentStaff implements StaffRepository
{  
    public function paginate($perPage, $search = null)
    {   
        $query = Staff::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', "like", "%{$search}%");
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
        return Staff::all();
    }

    public function create(array $data)
    {   
        $create = ['name'=>$data['name'], 'dob'=>$this->getDate($data['dob']), 'job'=>$data['job'], 'address'=>$data['address'] ,'phone'=>$data['phone']];
        return Staff::create($create);
    }

    public function find($id) 
    {
        return Staff::find($id);
    }

    public function update($id, array $data)
    {   
        $update = ['name'=>$data['name'], 'dob'=>$this->getDate($data['dob']), 'job'=>$data['job'], 'address'=>$data['address'] ,'phone'=>$data['phone']];
        return Staff::find($id)->update($update);
    } 

    public function delete($id)
    {
        return Staff::find($id)->delete();
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