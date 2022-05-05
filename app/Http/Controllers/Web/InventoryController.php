<?php

namespace Vanguard\Http\Controllers\Web;

use Carbon\Carbon;
use Validator;
use DB;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\InventoryRequest;
use Vanguard\Repositories\Inventory\InventoryRepository;


class InventoryController extends Controller
{
    
    private $inventory;
     
    public function __construct(InventoryRepository $inventory)
    {  
		$this->inventory = $inventory;
	} 

    public function index(Request $request) 
    {   
        $active = 'inventory';
        $inventory_groups = array(); 
        $inventorys = $this->inventory->paginate($perPage = 10, $request->search);
        foreach($inventorys as $item){
            $inventory_groups[$item->parent_sparepart->id][] = $item;
        } 
        //dd($inventorys);
        $raw_paginate = json_encode($inventorys); 
        $paginate = json_decode($raw_paginate);
        return view('inventory.index', compact('active' , 'paginate' , 'inventory_groups'));
    } 

    public function create()
    {
        $active = 'inventory';
        $warehouses = getAllWarehouse();
        $spare_parts = getConmonCode('spare_part');
        return view('inventory.create', compact('active', 'spare_parts', 'warehouses'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $spare_id = $request->input('spare_id');
        $groups = array(); 
        foreach($data as $key => $value ){
            
            if($key == 'spare_id' || is_null($value)){
                continue;
            }
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);
        $create = $this->inventory->create($spare_id, $groups);
        if($create)
        {
            return redirect()->route('inventory.index')->withSuccess("Success");
        }
        return redirect()->route('inventory.index')->withSuccess("Fail");
    }

    public function show($id)
    {  
        // 
    } 

    public function edit($id)
    {
        $active = 'inventory';
        $warehouses = getAllWarehouse();
        $spare_parts = getConmonCode('spare_part');
        $edit = $this->inventory->find($id);
        return view('inventory.edit', compact('active', 'spare_parts', 'edit' , 'warehouses'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->inventory->update($id, $request->all());
        if($data)
        {
            return redirect()->route('inventory.index')->withSuccess("Success");
        }
        return redirect()->route('inventory.index')->withSuccess("Fail");
    }

    public function destroy($id)
    {
        $data = $this->inventory->delete($id);
        if($data)
        {
            return redirect()->route('inventory.index')->withSuccess("Success");
        }
        return redirect()->route('inventory.index')->withSuccess("Fail");
    }
}
