<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request; 
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Revenue\RevenueRepository;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;
use Mpdf\Mpdf;
use PDF;


class ReportStandardController extends Controller
{
    private $revenue; 
    private $maintenance;
      
    public function __construct(RevenueRepository $revenue, MaintenanceRepository $maintenance)
    {  
		$this->revenue = $revenue;
        $this->maintenance = $maintenance;
	}  

    public function index() 
    {
        $active = 'reportstandard'; 
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        
        return view('report.standard-report.index', compact('active', 'key_sort'));
    } 
 
    public function create()
    {
        //
    }  

    public function store(Request $request)
    {
        $active = 'reportstandard'; 
        $data = $request->all();
        $str_from_date = $data['from_date'];
        $str_to_date = $data['to_date'];
       
        $incomes = $this->revenue->findByKey([getStringDate($str_from_date), getStringDate($str_to_date)]);
        $expenses = $this->maintenance->findByKey([getStringDate($str_from_date), getStringDate($str_to_date)]); 
        
        $total_expense = 0;
        $total_income = 0;
        $net_income = 0;
       
        $net_income = $total_income - $total_expense;
        
        return view('report.standard-report.result', compact('active', 'expenses', 'incomes', 'net_income', 'data'));
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
