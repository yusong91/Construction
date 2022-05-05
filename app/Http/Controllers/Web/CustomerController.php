<?php

namespace Vanguard\Http\Controllers\Web; 

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\CustomerRequest;
use Vanguard\Repositories\Customer\CustomerRepository;

class CustomerController extends Controller
{ 
    private $customer;
     
    public function __construct(CustomerRepository $customer)
    {  
		$this->customer = $customer;
	} 

    public function index(Request $request)
    {   
        $active = "customer";
        $paginates_groups = array(); 
        $customers = $this->customer->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($customers); 
        $paginate = json_decode($raw_paginate);
        //dd($customers);
        return view('customer.index', compact('active', 'paginate', 'customers'));
    }

    public function create()
    {   
        $active = "customer";
        return view('customer.create', compact('active'));
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
        $create = $this->customer->create($groups);
        if($create)
        {
            return redirect()->route('customer.index')->withSuccess("Success");
        }
        return redirect()->route('customer.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        $active = "customer";
        $edit = $this->customer->find($id);
        return view('customer.detail', compact('active', 'edit'));
    }

    

    public function edit($id)
    {
        $active = "customer";
        $edit = $this->customer->find($id);
        return view('customer.edit', compact('active', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customer->update($id, $request->all());
        if($customer){
            return redirect(route('customer.index'))->withSuccess('Success');
        }
        return redirect(route('customer.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->customer->delete($id);
        if($delete)
        {
            return redirect(route('customer.index'))->withSuccess('Success');
        }
        return redirect(route('customer.index'))->withSuccess('Fail');
    }
}