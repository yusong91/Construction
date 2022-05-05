<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Warehouse\WarehouseRepository;

 
class WarehouseController extends Controller
{
    private $warehouse; 
     
    public function __construct(WarehouseRepository $warehouse)
    {  
		$this->warehouse = $warehouse;
	}

    public function index(Request $request)
    {
        $warehouses = $this->warehouse->paginate(100, $request->search);
        return view('warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouse.create');
    }

    public function store(Request $request)
    {
        $store = $this->warehouse->create($request->all());
        if($store)
        {
            return redirect()->route('warehouse.index')->withSuccess("Success");
        }
        return redirect()->route('warehouse.index')->withSuccess("Fail");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edit = $this->warehouse->find($id);
        return view('warehouse.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->warehouse->update($id, $request->all());
        if($update)
        {
            return redirect()->route('warehouse.index')->withSuccess("Success");
        }
        return redirect()->route('warehouse.index')->withSuccess("Fail");
    }

    public function destroy($id)
    {
        $delete = $this->warehouse->delete($id);
        if($delete)
        {
            return redirect()->route('warehouse.index')->withSuccess("Success");
        }
        return redirect()->route('warehouse.index')->withSuccess("Fail");
    }
}
