<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\SparePart\SparePartRepository;
use Vanguard\Http\Requests\SparePartRequest;


class SparePartController extends Controller
{
     
    private $sparepart;
      
    public function __construct(SparePartRepository $sparepart)
    {  
		$this->sparepart = $sparepart;
	}

    public function index()
    {   
        $active = 'sparepart'; 
        $spareparts = $this->sparepart->all();
        return view('spare-part.index', compact('active', 'spareparts')); 
    }

    public function create()
    {
        //getConmunCode($key)
    }

    public function store(Request $request)
    {
        $spare_part = getConmonCodeParent('spare_part');

        $parent_id = $spare_part->id ?? null;

        $key = str_replace(" ","_", $request->input('value'));

        if($parent_id)
        {
            $data = ['key'=>strtolower($key), 'value'=>$request->input('value'), 'parent_id'=>$parent_id];

            $create = $this->sparepart->create($data);
            if($create)
            {
                return redirect(route('sparepart.index'))->withSuccess('Success');
            }
        }
        return redirect(route('sparepart.index'))->withSuccess('Fail');
        
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $active = 'sparepart'; 
        $spareparts = $this->sparepart->all();
        $edit = $this->sparepart->find($id);
        return view('spare-part.index', compact('active', 'spareparts', 'edit')); 
    }

    public function update(SparePartRequest $request, $id)
    {
        $sparepart = $this->sparepart->update($id, $request->all());
        if($sparepart){
            return redirect(route('sparepart.index'))->withSuccess('Success');
        }
        return redirect(route('sparepart.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->sparepart->delete($id);
        if($delete)
        {
            return redirect(route('sparepart.index'))->withSuccess('Success');
        }
        return redirect(route('sparepart.index'))->withSuccess('Fail');
    }
}
