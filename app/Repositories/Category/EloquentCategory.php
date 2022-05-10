<?php
 
namespace Vanguard\Repositories\Category;

use Vanguard\Model\CommonCode;

class EloquentCategory implements CategoryRepository
{  
 
    public function all() 
    {
        return getConmonCode('category');
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
        $delete = CommonCode::with('children_inventory')->find($id);

        if(count($delete->children_inventory) > 0)
        {
            return false;
        }
        return $delete->delete();
    }

}