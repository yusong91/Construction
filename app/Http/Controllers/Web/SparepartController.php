<?php
 
namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Sparepart\SparepartRepository;
use PDF;
use Excel;
use Vanguard\Excel\ExcelSparepart;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Mpdf\Mpdf; 

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

    public function edit($id)
    {   
        $active = "sparepart";
        $edit = $this->sparepart->find($id);
        return view('spare-part.edit', compact('active', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $update = $this->sparepart->update($id, $request->all());
        if($update)
        { 
            return redirect()->route('sparepart.index')->withSuccess("Success");
        }
        return redirect()->route('sparepart.index')->withSuccess("Fail");
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

    

    public function destroy($id)
    {
        // 
    } 
 
    public function downloadExcel() 
    {
        $spareparts = $this->sparepart->all();
        return Excel::download(new ExcelSparepart($spareparts), 'sparepart.xlsx'); 
    }

    public function downloadPdf()
    {
        //return $pdf->loadHtml($pdf_view)->stream($file); //work on GCP download loadHtml
        //$pdf_view = view('pdf.sparepart', compact('spareparts'));
        $spareparts = $this->sparepart->all(); 
        $pdf = \App::make('dompdf.wrapper');
        $file = "sparepart.pdf";
        $pdf_view = mb_convert_encoding(\View::make('pdf.sparepart', compact('spareparts')), 'HTML-ENTITIES', 'UTF-8');
        return PDF::loadHtml($pdf_view)->download($file); 
    }
}
