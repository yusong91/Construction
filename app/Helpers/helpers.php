<?php

if(!function_exists('getStaff')){
    function getStaff(){
        $staffs = \Vanguard\Model\Staff::all();
        return $staffs;
    }
}

if(!function_exists('getSupplier')){
    function getSupplier(){
        $suppliers = \Vanguard\Model\Supplier::all();
        return $suppliers;
    }
}
 
if(!function_exists('getEquipmentAll')){
    function getEquipmentAll(){
        $equipments = \Vanguard\Model\Equipment::where('sold', 0)->get();
        return $equipments;
    }
}
 
if(!function_exists('getConmonCode')){
    function getConmonCode($key){
        $communCode = \Vanguard\Model\CommonCode::where('key',$key)->first();
        return $communCode->children;
    }
}

if(!function_exists('getConmonCodeParent')){
    function getConmonCodeParent($key){
        $communCode = \Vanguard\Model\CommonCode::where('key',$key)->first();
        return $communCode;
    }
}

if(!function_exists('getLocationCode')){
    function getLocationCode($type){
        $provinceCode = \Vanguard\Model\LocationCode::where('type',$type)->get();
        
        return $provinceCode;
    }
}

if(!function_exists('getDateFormat')){
    function getDateFormat($date){
        if($date==null) {
            return "";
        }
        return date('d/m/Y',strtotime($date));
    }
}

if(!function_exists('getCustomer')){
    function getCustomer(){
        $customers = \Vanguard\Model\Customer::all();
        return $customers;
    } 
}

if(!function_exists('getSparePart')){
    function getSparePart(){
        $spare = \Vanguard\Model\CommonCode::where('parent_id', 1)->with('children_inventory')->get();
        return $spare;
    }
}

if(!function_exists('getEquipment')){
    function getEquipment(){
        $equipments = \Vanguard\Model\CommonCode::where('parent_id', 10)->with('children_equipment')->get();
        return $equipments;
    }
} 


if(!function_exists('getStringDate')){
    function getStringDate($date){
        if($date==null) {
            return "";
        }
        $time = strtotime(str_replace('/', '-', $date));
        return date('Y-m-d', $time);
    }
}

if(!function_exists('getAllWarehouse')){
    function getAllWarehouse(){
        $data = \Vanguard\Model\Warehouse::all();
        return $data;
    }
}

if(!function_exists('getAllCustomer')){
    function getAllCustomer(){
        $data = \Vanguard\Model\Customer::with('child_revenue')->with('child_revenue.parent_equipment')->with('child_revenue.parent_equipment.revenue_parent_quipment')->get();
        return $data;
    }
}

if(!function_exists('getUrl')){
    function getUrl($path){
        $data = "https://storage.googleapis.com/construction_bucket/" . $path;
        return $data;
    }
}

function check_string($my_string){
    $regex = preg_match('[@_!#$%^&*()<>?/|}{~:]', $my_string);
    if($regex)
       return true;
    else
       return false;
}

if(!function_exists('getClaimed')){
    function getClaimed(){
        $data = \Vanguard\Model\Unclaim::with('staff_parent')->get();
        return $data;
    }
}





