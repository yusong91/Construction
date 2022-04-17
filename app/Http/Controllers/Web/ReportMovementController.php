<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Customer\CustomerRepository;
use Vanguard\Repositories\CommonCode\CommonCodeRepository;

class ReportMovementController extends Controller
{
    private $customer;
    private $common; 
       
    public function __construct(CustomerRepository $customer, CommonCodeRepository $common)
    {  
		$this->customer = $customer;
        $this->common = $common;
	}   
 
    public function index()
    {
        $active = 'reportmovement'; 

        return view('report.movement-report.index', compact('active'));        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $active = 'reportmovement'; 

        $data = $request->all();

        $equipments = $this->common->getEquipmentMovement($data);

        return view('report.movement-report.result', compact('active', 'equipments')); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
