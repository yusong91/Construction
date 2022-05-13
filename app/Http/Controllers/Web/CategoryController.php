<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Category\CategoryRepository;
use Vanguard\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{    
    private $category;
      
    public function __construct(CategoryRepository $category)
    {  
		$this->category = $category;
	}

    public function index()
    {   
        $active = 'inventory'; // sparepart
        $categorys = $this->category->all(); 
        return view('category.index', compact('active', 'categorys')); 
    }

    public function create()
    {
        //getConmunCode($key)
    }
 
    public function store(CategoryRequest $request)
    {   
        $category = getConmonCodeParent('category');
        $parent_id = $category->id ?? null;
        $key = str_replace(" ","_", $request->input('value'));
        if($parent_id)
        {
            $data = ['key'=>strtolower($key), 'value'=>$request->value, 'parent_id'=>$parent_id, 'description'=>$request->description];
            $create = $this->category->create($data);
            if($create)
            {
                return redirect(route('category.index'))->withSuccess('Success');
            }
        }
        return redirect(route('category.index'))->withSuccess('Fail');
    }

    public function show($id){}

    public function edit($id)
    {
        $active = 'inventory'; 
        $categorys = $this->category->all();
        $edit = $this->category->find($id);
        return view('category.index', compact('active', 'categorys', 'edit')); 
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->update($id, $request->all());
        if($category){
            return redirect(route('category.index'))->withSuccess('Success');
        }
        return redirect(route('category.index'))->withSuccess('Fail');
    }

    public function destroy($id)
    {
        $delete = $this->category->delete($id);
        if($delete)
        {
            return redirect(route('category.index'))->withSuccess('Success');
        }
        return redirect(route('category.index'))->withSuccess('Fail');
    }
}
