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

    //Store claim
    public function create(Request $request)
    {

        // $data = $request->all();
        // $list_unclaim = array(); 
        
        // foreach($data as $key => $value ){

        //     if(substr($key, 0, 1) == 'p' || substr($key, 0, 1) == 's'){
        //         continue;
        //     }
                
        //     $list_unclaim[substr($key, 0, 1)][] = $value;
        // } 
        // array_pop($list_unclaim);

        // dd($list_unclaim);

        if(isset($request->maintenance_id) == false)
        {
            return redirect()->route('unclaim.index')->withErrors("Claim Error");
        }

        $create = $this->unclaim->create($request->all());

        if($create)
        {
            return redirect()->route('unclaim.index')->withSuccess("Success");
        }
        return redirect()->route('unclaim.index')->withErrors("Claim Error");
    }

    //Confirm claim
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
