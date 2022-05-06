<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Revenue\RevenueRepository;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;
use Vanguard\Repositories\CommonCode\CommonCodeRepository;



class ReportEquipmentController extends Controller
{
    
    private $revenue;
    private $maintenance;
    private $common; 
       
    public function __construct(RevenueRepository $revenue, MaintenanceRepository $maintenance, CommonCodeRepository $common)
    {  
		$this->revenue = $revenue;
        $this->maintenance = $maintenance;
        $this->common = $common;
	}  

    public function index()
    {
        $active = 'reportequipment'; 
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $sort = '';
        return view('report.equipment-report.index', compact('active', 'key_sort', 'sort'));
    }
 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $active = 'reportequipment'; 
        $data = $request->all();
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $equipment = $this->common->getEquipmentReport($data);
        $sort = $data['sort_by'];
        return view('report.equipment-report.result', compact('active', 'equipment', 'data', 'key_sort', 'sort'));
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
