<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\CommonCode\CommonCodeRepository;
use Vanguard\Repositories\Equipment\EquipmentRepository;
use Mpdf\Mpdf;
use PDF;


class ReportEquipmentOutStandController extends Controller
{ 
    private $common; 
    private $equipment;
        
    public function __construct(CommonCodeRepository $common, EquipmentRepository $equipment)
    {  
        $this->common = $common;
        $this->equipment = $equipment;
	}

    public function index()
    {
        $active = 'reportequipmentoutstand'; 

        $equipments = $this->equipment->outstanding(0);

        //dd($equipments);

        return view('report.equipmentoutstand-report.index', compact('active', 'equipments'));  
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function downloadExcel() 
    {
        $equipments = $this->equipment->outstanding(0);
        return Excel::download(new ExcelSparepart($equipments), 'sparepart.xlsx'); 
    }

    public function downloadPdf()
    {
        $equipments = $this->equipment->outstanding(0);
        $pdf_view = view('pdf.outstand', compact('equipments'));
        $pdf_view = mb_convert_encoding(\View::make('pdf.outstand', compact('equipments')), 'HTML-ENTITIES', 'UTF-8');
        $file = "equipmentoutstanding.pdf";
        $pdf = \App::make('dompdf.wrapper');
        return PDF::loadHtml($pdf_view)->download($file); 
    }
}
