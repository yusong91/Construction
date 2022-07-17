<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Model\CommonCode;
use Vanguard\Http\Requests\CommonCode\CreateRequest;
use Vanguard\Http\Requests\CommonCode\MenuRequest;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Requests\CommonCode\UpdateRequest;
use Vanguard\Repositories\CommonCode\CommonCodeRepository;
use Illuminate\Support\Facades\Storage;
use Validator;

class CommonCodeController extends Controller
{

    private $breadcrumbs;

    public function __construct()
    {
        $this->middleware('auth');

        $this->breadcrumbs = [
            [ 'label' => __('លេខកូដប្រព័ន្ធ'), 'link' => route('common-codes.index'), 'isActive' => true ],
        ];
    }

    public function index(){

        return view('common-code.index', [
            'parentCommonCode' => null,
            'commonCodes' => $this->getCommonCodeCollection(),
            'breadcrumbs' => $this->getBreadcrumbs(),
            'page_title'=>''
        ]);
    }

    public function show($id)
    {        
        $commonCode = CommonCode::find($id);

        $page_title = $commonCode->value;
        
        return view('common-code.index', [
            'parentCommonCode' => $commonCode,
            'commonCodes' => $this->getCommonCodeCollection($commonCode->id),
            'breadcrumbs' => $this->getBreadcrumbs($commonCode),
            'page_title'=>$page_title
        ]);
    }

    public function create(Request $request){

        $parentCommonCode = CommonCode::find($request->parent_id);

        $page_title = $parentCommonCode->value;

        $this->breadcrumbs[0]['isActive'] = false;
        return view('common-code.add-edit',[
            'parentCommonCode'=>$parentCommonCode,
            'breadcrumbs'=>$this->getBreadcrumbs($parentCommonCode, true),
            'page_title'=>$page_title
        ]);
    }

    public function store(CreateRequest $request){
        
        $digital_file = "";

        $file = $request->file('image');

        if($file) 
        { 
            $digital_file = Storage::putFile('img', $file);
        }

        $key = trim($request->value);

        $commonCode = CommonCode::create(['key'=>$key, 'value'=>$request->input('value'), 'image'=>$digital_file, 'parent_id'=>$request->input('parent_id')]);

        if ($commonCode->parent_id) {
            return redirect()->route('common-codes.show', $commonCode->parent)->withSuccess(__('Success'));
        }

        return redirect()->route('common-codes.index')->withSuccess(__('Success'));
    } 


    public function edit($id)
    {
        $commonCode = CommonCode::find($id);
        $this->breadcrumbs[0]['isActive'] = false;

        $page_title = $commonCode->value;

        return view('common-code.add-edit', [
            'parentCommonCode' => $commonCode,
            'commonCode' => $commonCode,
            'breadcrumbs' => $this->getBreadcrumbs($commonCode->parent, true),
            'page_title'=>$page_title
        ]);
    }

    public function update($id, Request $request)
    {
        $commonCode = CommonCode::find($id);

        $digital_file = "";

        $file = $request->file('image');
        
        if($file) 
        { 
            $digital_file = Storage::putFile('img', $file);
        }

        $data = ['key'=>$request->input('key'), 'value'=>$request->input('value'), 'image'=>$digital_file];

        $commonCode->update($data);

        if ($commonCode->parent_id) {
            return redirect()->route('common-codes.show',$commonCode->parent)->withSuccess(__('Success'));
        }

        return redirect()->route('common-codes.index')->withSuccess(__('Success'));
    }

    public function destroy($id)
    {
        $commonCode = CommonCode::find($id);
        $commonCode->delete();

        return redirect()->back()->withSuccess(__('Success'));
    }

    private function getCommonCodeCollection($parentId = 0) {
        return CommonCode::withCount('children')
            ->whereParentId($parentId)
            ->orderBy('ordering', 'asc')
            ->paginate(20);
    }

    private function getBreadcrumbs(CommonCode $commonCode = null, $addEditPage = false) {
        if ($commonCode) {
            if ($commonCode->parent) {
                $this->getBreadcrumbs($commonCode->parent, $addEditPage);
            }

            $this->breadcrumbs[] = ['label' => $commonCode->value, 'link' => route('common-codes.show', $commonCode->id), 'isActive' => true];
            $this->breadcrumbs[count($this->breadcrumbs) - ($addEditPage ? 1 : 2)]['isActive'] = false;
        }

        return $this->breadcrumbs;
    }

    public function updateOrder(Request $request) {

        DB::beginTransaction();
        try {
            CommonCode::setNewOrder($request->get('item'));
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
