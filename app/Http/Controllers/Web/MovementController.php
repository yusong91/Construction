<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\MovementRent\MovementRepository;

class MovementController extends Controller
{ 
    private $movement;
      
    public function __construct(MovementRepository $movement)
    {  
		$this->movement = $movement;
	}

    public function index(Request $request)
    {   
        $active = "movement";
        $movements = $this->movement->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($movements); 
        $paginate = json_decode($raw_paginate);
        return view('movement-rent.index', compact('active', 'movements', 'paginate'));
    }

    public function create()
    {   
        $active = "movement";
        $customers = getCustomer();
        $equipments = getEquipmentAll();
        return view('movement-rent.create', compact('active', 'customers', 'equipments'));
    } 

    public function store(Request $request)
    {
        $data = $request->all();
        $groups = array(); 
        
        foreach($data as $key => $value ){            
            if(is_null($value)){
                continue;
            }
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);
        $create = $this->movement->create($groups);
        if($create)
        {
            return redirect()->route('movement.index')->withSuccess("Success");
        }
        return redirect()->route('movement.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $active = 'movement'; 
        $edit = $this->movement->find($id);
        $customers = getCustomer();
        $equipments = getEquipmentAll(); 
        return view("movement-rent.edit", compact('active', 'edit', 'equipments', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $movement = $this->movement->update($id, $request->all());
        if($movement){
            return redirect(route('movement.index'))->withSuccess('Success');
        }
        return redirect(route('movement.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->movement->delete($id);
        if($delete)
        {
            return redirect(route('movement.index'))->withSuccess('Success');
        }
        return redirect(route('movement.index'))->withSuccess('Fail');
    }
}
