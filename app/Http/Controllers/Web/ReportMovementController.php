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
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $sort = '';
        return view('report.movement-report.index', compact('active', 'key_sort', 'sort'));        
    }

    public function create()
    {
         
    }
 
    public function store(Request $request)
    {
        $active = 'reportmovement'; 
        $data = $request->all();
        $equipments = $this->common->getEquipmentMovement($data);
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $sort = $data['sort_by'];
        return view('report.movement-report.result', compact('active', 'equipments', 'key_sort', 'sort', 'data')); 
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
