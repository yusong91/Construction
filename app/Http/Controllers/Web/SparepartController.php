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
 
    public function downloadExcel() 
    {
        $spareparts = $this->sparepart->all();
        return Excel::download(new ExcelSparepart($spareparts), 'sparepart.xlsx'); 
    }

    public function downloadPdf()
    {
        $spareparts = $this->sparepart->all(); 
        $pdf_view = view('pdf.sparepart', compact('spareparts'));
        $file = "sparepart.pdf";
        $pdf = \App::make('dompdf.wrapper');
        //return $pdf->loadHtml($pdf_view)->stream($file); //work on GCP download

        return PDF::loadHtml($pdf_view)->stream($file);
    }
}
