<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request; 
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;


class MaintenanceController extends Controller
{
    private $maintenance;
     
    public function __construct(MaintenanceRepository $maintenance)
    {  
		$this->maintenance = $maintenance;
	} 
      
    public function index(Request $request)
    {   
        $active = "maintenance";
        $maintenances = $this->maintenance->paginate($perPage = 10, $request->search);
        $raw_paginate = json_encode($maintenances); 
        $paginate = json_decode($raw_paginate);
        return view('maintenance-sparepart.index', compact('active', 'maintenances', 'paginate'));
    } 

    public function create()
    {   
        $active = "maintenance";
        $spare_parts = getSparePart();
        $staffs = getStaff();
        $suppliers = getSupplier(); 
        $equipments = getEquipment();
        $types = ['new_spare_part'=>'New Spare Part', 'inventory'=>'From Inventory', 'service'=>'Service'];
        return view('maintenance-sparepart.create', compact('active', 'staffs', 'suppliers', 'spare_parts', 'equipments', 'types'));
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

        $create = $this->maintenance->create($groups);
        
        if($create)
        {
            return redirect()->route('maintenance.index')->withSuccess("Success");
        }
        return redirect()->route('maintenance.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $active = "maintenance";
        $spare_parts = getSparePart();
        $staffs = getStaff();
        $suppliers = getSupplier(); 
        $equipments = getEquipment();
        $edit = $this->maintenance->find($id);
        return view('maintenance-sparepart.edit', compact('active', 'edit', 'staffs', 'suppliers', 'spare_parts', 'equipments'));
    }

    public function update(Request $request, $id)
    {
        $maintenance = $this->maintenance->update($id, $request->all());
        if($maintenance){
            return redirect(route('maintenance.index'))->withSuccess('Success');
        }
        return redirect(route('maintenance.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->maintenance->delete($id);
        if($delete){
            return redirect(route('maintenance.index'))->withSuccess('Success');
        }
        return redirect(route('maintenance.index'))->withSuccess('Fail');
    }
}
