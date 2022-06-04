<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Claim\ClaimRepository;

class ClaimInvoiceController extends Controller
{
    private $claim; 

    public function __construct(ClaimRepository $claim)
    {  
		$this->claim = $claim;
	}

    public function index()
    {
        $active = "claim";
        $claims = getClaimed();//$this->claim->all();
        return view('invoice.claim.index', compact('active','claims'));
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
}
