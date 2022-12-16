<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request; 
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Revenue\RevenueRepository;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;
use Vanguard\Repositories\Equipment\EquipmentRepository;
use Mpdf\Mpdf;
use PDF;
use Carbon\Carbon;
use DB;


class ReportStandardController extends Controller
{
    private $revenue; 
    private $maintenance;
    private $equipment;
      
    public function __construct(RevenueRepository $revenue, MaintenanceRepository $maintenance, EquipmentRepository $equipment)
    {  
		$this->revenue = $revenue;
        $this->maintenance = $maintenance;
        $this->equipment = $equipment;
	}  

    public function index() 
    {
        $active = 'reportstandard'; 
        $equipment_type_selected = 0;
        $equipment_types = getEquipmentType(10);

        return view('report.standard-report.index', compact('active', 'equipment_types', 'equipment_type_selected'));
    } 
 
    public function create()
    {
        //
    }  

    public function store(Request $request)
    {
        $active = 'reportstandard'; 
        $total_sparepart = 0;
        $inventories = array(); 
        $expend_inventory = array();
        $data = $request->all();
        $str_from_date = $data['from_date'] ?? null;
        $str_to_date = $data['to_date'] ?? null;

        $equipment_types = getEquipmentType(10);

        $str_array_select = explode('|', $data['equipment_type']);

        $equipment_type_selected = isset($str_array_select[1]) ? intval($str_array_select[1]) : 0;
 
        $last_date_of_month = isset($str_to_date) ? $str_to_date : Carbon::createFromFormat('d/m/Y', $str_from_date)->endOfMonth()->format('Y-m-d');
  
        $results = getReportStandard($equipment_type_selected, getStringDate($str_from_date), $last_date_of_month);

        //dd($results);

        $expend_maintenance_by_date = $this->maintenance->getMaintenanceByDate(getStringDate($str_from_date), $last_date_of_month);


        //dd($expend_maintenance_by_date);


        foreach($expend_maintenance_by_date as $maintenance)
        {
            $spare_parts = $maintenance->sparepart_children;

            $inventory = $maintenance->parent_inventory ?? null;
        
            foreach($spare_parts as $spare_part)
            {
                $total_sparepart += $spare_part->amount;
            }   

            if($inventory != null)
            {
                $inventories[$inventory->category_id][] = ['name'=>$inventory->name, 'price'=>$maintenance->quantity * $inventory->price];
            }
        }

        foreach($inventories as $key => $values)
        {
            $category = DB::table('commond_codes')->find($key);

            $price = 0;

            foreach($values as $value)
            {
                $price += $value['price'];
            }

           

            $expend_inventory[] = ['category'=>$category->value, 'expend'=>$price];
        }

        //dd($expend_inventory);

        //$this->equipment->standard_report($equipment_type_selected, getStringDate($str_from_date), getStringDate($str_to_date));

        return view('report.standard-report.result', compact('active', 'data', 'equipment_types', 'equipment_type_selected', 'results', 'last_date_of_month', 'expend_maintenance_by_date', 'total_sparepart', 'expend_inventory'));
    }

    public function downloadPdf()
    {
        $reports = [1];//$this->equipment->all(); 
        $pdf_view = mb_convert_encoding(\View::make('pdf.report-standard', compact('reports')), 'HTML-ENTITIES', 'UTF-8');
        $file = "standard-report.pdf";
        $pdf = \App::make('dompdf.wrapper');
        return PDF::loadHtml($pdf_view)->stream($file); //download
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
