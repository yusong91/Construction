<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Sparepart\SparepartRepository;

class SparepartController extends Controller
{
    private $sparepart;
     
    public function __construct(SparepartRepository $sparepart)
    {  
		$this->sparepart = $sparepart;
	}
    
    public function index(Request $request)
    {
        $active = "sparepart";
        $spareparts = $this->sparepart->paginate(50, $request->search);
        return view('spare-part.index', compact('active', 'spareparts'));
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
