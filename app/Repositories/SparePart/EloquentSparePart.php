<?php
 
namespace Vanguard\Repositories\SparePart;

use Vanguard\Model\SparePart;
use Vanguard\Model\CommonCode;

class EloquentSparePart implements SparePartRepository
{  
 
    public function all() 
    {
        return getConmonCode('spare_part');
    }

    public function create(array $data)
    {
        return CommonCode::create($data); 
    }

    public function find($id) 
    {
        return CommonCode::find($id);
    }

    public function update($id, array $data)
    {
        return CommonCode::find($id)->update($data);
    }

    public function delete($id)
    {
        return CommonCode::find($id)->delete();
    }

}