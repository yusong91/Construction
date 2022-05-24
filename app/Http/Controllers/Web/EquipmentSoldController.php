<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\EquipmentSold\EquipmentSoldRepository;

class EquipmentSoldController extends Controller
{
    private $equipmentsold; 
     
    public function __construct(EquipmentSoldRepository $equipmentsold)
    {  
		$this->equipmentsold = $equipmentsold;
	}  

    public function index(Request $request)
    {
        $active = "equipmentsold";
        $equipmentsolds = $this->equipmentsold->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($equipmentsolds); 
        $paginate = json_decode($raw_paginate);
        return view('equipment-sold.index', compact('active', 'equipmentsolds', 'paginate'));
    } 

    public function create()
    {   
        $active = "equipmentsold";
        $equipments = getEquipmentAll();
        return view('equipment-sold.create', compact('active', 'equipments'));
    }

    public function store(Request $request)
    { 
        $data = $request->all();
        $groups = array(); 
        foreach($data as $key => $value ){            
            // if(is_null($value)){
            //     continue;
            // }
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);
        $create = $this->equipmentsold->create($groups);
        if($create)
        {
            return redirect()->route('equipmentsold.index')->withSuccess("Success");
        }
        return redirect()->route('equipmentsold.index')->withSuccess("Fail");
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $active = 'equipmentsold'; 
        $edit = $this->equipmentsold->find($id);
        $equipments = getEquipmentAll();   
        
        return view("equipment-sold.edit", compact('active', 'edit', 'equipments'));
    }

    public function update(Request $request, $id)
    {
        $sparepart = $this->equipmentsold->update($id, $request->all());
        if($sparepart){
            return redirect(route('equipmentsold.index'))->withSuccess('Success');
        }
        return redirect(route('equipmentsold.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->equipmentsold->delete($id);
        if($delete)
        {
            return redirect(route('equipmentsold.index'))->withSuccess('Success');
        }
        return redirect(route('equipmentsold.index'))->withSuccess('Fail');
    }
}
