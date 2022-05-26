<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\SupplierRequest;
use Vanguard\Repositories\Supplier\SupplierRepository;


class SupplierController extends Controller
{
    private $supplier;
     
    public function __construct(SupplierRepository $supplier)
    {  
		$this->supplier = $supplier;
	}

    public function index(Request $request)
    {   
        $active = 'supplier';

        $suppliers = $this->supplier->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($suppliers); 
        $paginate = json_decode($raw_paginate);
        return view('supplier.index', compact('active', 'paginate', 'suppliers'));
    }

    public function create()
    {   
        $active = 'supplier';
        return view("supplier.create", compact('active'));
    } 

    public function store(Request $request)
    {
        $data = $request->all();
        $type_id = $request->input('equip_type_id');
        $groups = array(); 
        foreach($data as $key => $value ){
            
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);

        $create = $this->supplier->create($groups);
        if($create)
        {
            return redirect()->route('supplier.index')->withSuccess("Success");
        }
        return redirect()->route('supplier.index')->withSuccess("Fail");
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $active = 'supplier'; 
        $edit = $this->supplier->find($id);   
        return view("supplier.edit", compact('active', 'edit'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $sparepart = $this->supplier->update($id, $request->all());
        if($sparepart){
            return redirect(route('supplier.index'))->withSuccess('Success');
        }
        return redirect(route('supplier.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->supplier->delete($id);
        if($delete)
        {
            return redirect(route('supplier.index'))->withSuccess('Success');
        }
        return redirect(route('supplier.index'))->withSuccess('Fail');
    }
}
