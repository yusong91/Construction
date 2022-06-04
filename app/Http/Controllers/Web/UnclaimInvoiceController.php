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

    public function create(Request $request)
    {
        $create = $this->unclaim->create($request->all());

        if($create)
        {
            return redirect()->route('unclaim.index')->withSuccess("Success");
        }
        return redirect()->route('unclaim.index')->withErrors("No Insert");
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
        return view('invoice.unclaim.confirm', compact('active', 'list_unclaim', 'staffs', 'staff_id'));
    }

    public function show($id)
    {
        dd('ok');
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
