<?php

namespace Vanguard\Repositories\CommonCode;

use Vanguard\Model\CommonCode; 
use Carbon\Carbon;  
use DB;  
use Illuminate\Database\SQLiteConnection;

class EloquentCommonCode implements CommonCodeRepository 
{ 
    public function getEquipmentReport($key) 
    {   
        return CommonCode::where('parent_id', 10)->with('children_equipment')->with('children_equipment.child_revenue')->with('children_equipment.child_maintenance')->whereHas('children_equipment.child_revenue', function($q) use ($key) {

            $q->whereDate('from_date', '>=', getStringDate($key['from_date'])); 

            $q->whereDate('to_date', '>=', getStringDate($key['to_date']));

            $q->orderBy('from_date', $key['sort_by']);

        })->orWhereHas('children_equipment.child_maintenance', function($q) use ($key) {

            //$q->whereDate('date', '>=', getStringDate($key['from_date'])); 

        })->get();
    } 

    public function getEquipmentMovement($key)
    {       
        return CommonCode::where('parent_id', 10)->with('children_equipment')->with('children_equipment.child_movement')->whereHas('children_equipment.child_movement', function($q) use ($key) {

            $q->whereBetween('date', [getStringDate($key['from_date']), getStringDate($key['to_date'])]);

            $q->orderBy('date', $key['sort_by']);

        })->get();
    }

    public function getEquipmentOutstanding($key)
    {
        return CommonCode::where('parent_id', $key)->with('children_equipment')->get();
    }

    public function all()
    {
        return CommonCode::all();
    }
 
    public function create(array $data) 
    {
        return CommonCode::create($data);
    } 

    public function update($id ,array $data){

        return CommonCode::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $commonCode = CommonCode::find($id);

        return $commonCode->delete();
    }

}