<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

class UnclaimInvoiceController extends Controller
{
    
    public function index()
    {
        $active = "unclaim";
        return view('invoice.unclaim.index', compact('active'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $active = "unclaim";
        return view('invoice.unclaim.confirm', compact('active'));
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
