<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Staff\StaffRepository;
use Vanguard\Http\Requests\Staff\StaffCreateRequest;



class StaffController extends Controller
{
    private $staff;
     
    public function __construct(StaffRepository $staff)
    {  
		$this->staff = $staff;
	}

    public function index(Request $request)
    {
        $staffs = $this->staff->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($staffs); 
        $paginate = json_decode($raw_paginate);
        return view('staff.index', compact('paginate', 'staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(StaffCreateRequest $request)
    {
        $create = $this->staff->create($request->all());
        if($create)
        {
            return redirect()->route('staff.index')->withSuccess("Success");
        }
        return redirect()->route('staff.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $edit = $this->staff->find($id);
        return view('staff.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->staff->update($id, $request->all());
        if($update)
        {
            return redirect()->route('staff.index')->withSuccess("Success");
        }
        return redirect()->route('staff.index')->withSuccess("Fail");
    }

    public function destroy($id)
    {
        $delete = $this->staff->delete($id);
        if($delete)
        {
            return redirect()->route('staff.index')->withSuccess("Success");
        }
        return redirect()->route('staff.index')->withSuccess("Fail");
    }
}
