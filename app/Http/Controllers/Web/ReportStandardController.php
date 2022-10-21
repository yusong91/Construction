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

        //dd($equipment_types);

        return view('report.standard-report.index', compact('active', 'equipment_types', 'equipment_type_selected'));
    } 
 
    public function create()
    {
        //
    }  

    public function store(Request $request)
    {
        $active = 'reportstandard'; 
        $data = $request->all();
        $str_from_date = $data['from_date'] ?? '';

        $equipment_types = getEquipmentType(10);

        $str_array_select = explode('|', $data['equipment_type']);

        $equipment_type_selected = isset($str_array_select[1]) ? intval($str_array_select[1]) : 0;
 
        $last_date_of_month = Carbon::createFromFormat('m/d/Y', $str_from_date)->lastOfMonth()->format('Y-m-d');
  
        $results = getEquipmentTypeTest($equipment_type_selected, getStringDate($str_from_date), $last_date_of_month);//$this->equipment->standard_report($equipment_type_selected, getStringDate($str_from_date), getStringDate($str_to_date));

        //dd($results);

        return view('report.standard-report.result', compact('active', 'data', 'equipment_types', 'equipment_type_selected', 'results'));
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
