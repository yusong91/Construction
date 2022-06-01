<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Unclaim\UnclaimRepository;


class UnclaimInvoiceController extends Controller
{
    private $unclaim;

    public function __construct(UnclaimRepository $unclaim)
    {  
		$this->unclaim = $unclaim;
	}

    public function index()
    {
        $active = "unclaim";
        $unclaims = $this->unclaim->all();
        return view('invoice.unclaim.index', compact('active', 'unclaims'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $active = "unclaim";
        $staffs = getStaff();
        $staff_id = $request->staff_id;
        
        $data = $request->all();
        $list_unclaim = array(); 

        foreach($data as $key => $value ){

            if(substr($key, 0, 1) == 's'){
                continue;
            }
                
            $list_unclaim[substr($key, 0, 1)][] = $value;
        } 
        array_pop($list_unclaim);
        //dd($list_unclaim);
        return view('invoice.unclaim.confirm', compact('active', 'list_unclaim', 'staffs', 'staff_id'));
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
