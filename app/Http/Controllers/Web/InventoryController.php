<?php

namespace Vanguard\Http\Controllers\Web;

use Carbon\Carbon;
use Validator;
use DB;
use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\InventoryRequest;
use Vanguard\Excel\ExcelInventory;
use Vanguard\Repositories\Inventory\InventoryRepository;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Mpdf\Mpdf;
use PDF;

class InventoryController extends Controller
{
    
    private $inventory;
     
    public function __construct(InventoryRepository $inventory)
    {  
		$this->inventory = $inventory;
	} 

    public function index(Request $request) 
    {    
        $active = 'inventory';
        $inventory_groups = array(); 
        $inventorys = $this->inventory->paginate($perPage = 10, $request->search);
        foreach($inventorys as $item){
            $inventory_groups[$item->parent_category->id][] = $item;
        } 
        $raw_paginate = json_encode($inventorys); 
        $paginate = json_decode($raw_paginate);
        return view('inventory.index', compact('active' , 'paginate' , 'inventory_groups'));
    } 

    public function create()
    {
        $active = 'inventory';
        $warehouses = getAllWarehouse();
        $categorys = getConmonCode('category');
        return view('inventory.create', compact('active', 'categorys', 'warehouses'));
    } 
 
    public function store(Request $request)
    {
        $data = $request->all();
        $category_id = $request->category_id;
        $groups = array(); 
        foreach($data as $key => $value ){
            
            $groups[substr($key, 0, 1)][] = $value;
        } 
        array_pop($groups);
        if(count($groups) < 1)
        {
            return redirect()->route('inventory.create')->withErrors("No Insert");
        } 
        $create = $this->inventory->create($category_id, $groups);
        if($create) 
        {
            return redirect()->route('inventory.create')->withSuccess("Success");
        }
        return redirect()->route('inventory.create')->withSuccess("Fail");
    }
 
    public function show($id)
    {  
        // 
    } 

    public function edit($id)
    {
        $active = 'inventory';
        $warehouses = getAllWarehouse();
        $categorys = getConmonCode('category');
        $edit = $this->inventory->find($id);
        return view('inventory.edit', compact('active', 'categorys', 'edit' , 'warehouses'));
    } 
 
    public function update(Request $request, $id)
    {
        $data = $this->inventory->update($id, $request->all());
        if($data)
        {
            return redirect()->route('inventory.index')->withSuccess("Success");
        }
        return redirect()->route('inventory.index')->withSuccess("Fail");
    }
 
    public function destroy($id)
    { 
        $data = $this->inventory->delete($id);
        if($data)
        {
            return redirect()->route('inventory.index')->withSuccess("Success");
        }
        return redirect()->route('inventory.index')->withSuccess("Fail");
    }

    public function downloadExcel() 
    {
        $inventories = $this->inventory->all();
        return Excel::download(new ExcelInventory($inventories), 'inventory.xlsx'); 
    }

    public function downloadPdf()
    {
        $inventories = $this->inventory->all(); 
        $pdf_view = mb_convert_encoding(\View::make('pdf.inventory', compact('inventories')), 'HTML-ENTITIES', 'UTF-8');
        $file = "inventory.pdf";
        $pdf = \App::make('dompdf.wrapper');
        return PDF::loadHtml($pdf_view)->download($file); 
    }
}
