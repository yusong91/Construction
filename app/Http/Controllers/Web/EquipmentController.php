<?php

namespace Vanguard\Http\Controllers\Web;
 
use Vanguard\Model\Equipment; 
use Carbon\Carbon;
use Validator;
use DB;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\CreateEquipmentRequest;
use Vanguard\Repositories\Equipment\EquipmentRepository;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;
use Vanguard\Excel\ExcelEquipment;
use Excel;
use Mpdf\Mpdf;
use PDF;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
 
class EquipmentController extends Controller
{   
    private $equipment;
      
    public function __construct(EquipmentRepository $equipment)
    {  
		$this->equipment = $equipment;
	}
  
    public function index(Request $request) 
    {   
        $brand = getConmonCode('brand');
        $active = "equipment";
        $equipments = $this->equipment->paginate(20, $request->search);
        //dd($equipments);
        return view('equipment.index', compact('active', 'equipments'));
    }

    public function create() 
    {    
        $active = "equipment"; 
        $brands = getConmonCode('brand');
        $equipmentTypes = getConmonCode('equipment_type');
        return view('equipment.create', compact('equipmentTypes','brands','active'));
    }

    public function store(Request $request)
    {   
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]); 

        $data = $request->all();
        $type_id = $request->input('equip_type_id');
        $groups = array(); 
        foreach($data as $key => $value ){
            
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);

        $create = $this->equipment->create($type_id, $groups);
        if($create) 
        {
            return redirect()->route('equipment.index')->withSuccess("Success");
        }
        return redirect()->route('equipment.index')->withSuccess("Fail");
    }

    public function show($id, Request $request)
    {   
        $active = "equipment";
        $equipments = $this->equipment->paginateList($id, 10, $request->search);
        $raw_paginate = json_encode($equipments); 
        $paginate = json_decode($raw_paginate);
        return view('equipment.list', compact('active', 'equipments', 'paginate', 'id'));
    }
 
    public function edit($id)
    {
        $edit = $this->equipment->find($id);
        $active = "equipment"; 
        $brands = getConmonCode('brand');
        $equipmentTypes = getConmonCode('equipment_type');
        return view('equipment.edit', compact('equipmentTypes','brands','active', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->equipment->update($id, $request->all());
        if($update)
        {
            return redirect()->route('equipment.index')->withSuccess("Success");
        }
        return redirect()->route('equipment.index')->withSuccess("Fail");
    }

    public function destroy($id) 
    {
        $delete = $this->equipment->delete($id);
        if($delete)
        {
            return redirect()->route('equipment.index')->withSuccess("Success");
        }
        return redirect()->route('equipment.index')->withSuccess("Fail");
    }

    public function downloadExcel()
    {
        $equipments = $this->equipment->all(); 
        return Excel::download(new ExcelEquipment($equipments), 'equipment.xlsx'); 
    }

    public function downloadPdf()
    {
        $equipments = $this->equipment->all(); 
        $pdf_view = mb_convert_encoding(\View::make('pdf.equipment', compact('equipments')), 'HTML-ENTITIES', 'UTF-8');
        $file = "equipment.pdf";
        $pdf = \App::make('dompdf.wrapper');
        return PDF::loadHtml($pdf_view)->download($file);
    }
}
