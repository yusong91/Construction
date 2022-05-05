<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Revenue\RevenueRepository;


class RevenueController extends Controller
{
    private $revenue;
     
    public function __construct(RevenueRepository $revenue)
    {  
		$this->revenue = $revenue;
	}  
 
    public function index(Request $request) 
    {    
        $active = "revenue";
        $revenues = $this->revenue->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($revenues); 
        $paginate = json_decode($raw_paginate);
        $customers = getAllCustomer();
        //dd($customers);
        return view('revenue.test', compact('active', 'paginate', 'revenues', 'customers'));
    }

    public function create()
    {
        $active = "revenue";
        $customers = getCustomer();
        $equipments = getEquipmentAll();
        return view('revenue.create', compact('active', 'customers', 'equipments'));
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

        $create = $this->revenue->create($groups);
        if($create)
        {
            return redirect()->route('revenue.index')->withSuccess("Success");
        }
        return redirect()->route('revenue.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $active = 'revenue'; 
        $edit = $this->revenue->find($id);
        $customers = getCustomer();
        $equipments = getEquipmentAll();
        return view("revenue.edit", compact('active', 'edit', 'equipments', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->revenue->update($id, $request->all());
        if($update){
            return redirect(route('revenue.index'))->withSuccess('Success');
        }
        return redirect(route('revenue.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->revenue->delete($id);
        if($delete)
        {
            return redirect(route('revenue.index'))->withSuccess('Success');
        }
        return redirect(route('revenue.index'))->withSuccess('Fail');
    }
}
