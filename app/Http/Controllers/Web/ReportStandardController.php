<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request; 
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Revenue\RevenueRepository;
use Vanguard\Repositories\Maintenance\MaintenanceRepository;


class ReportStandardController extends Controller
{
    private $revenue;
    private $maintenance;
      
    public function __construct(RevenueRepository $revenue, MaintenanceRepository $maintenance)
    {  
		$this->revenue = $revenue;
        $this->maintenance = $maintenance;
	}  

    public function index() 
    {
        $active = 'reportstandard'; 
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $sort = '';
        
        return view('report.standard-report.index', compact('active', 'key_sort', 'sort'));
    } 
 
    public function create()
    {
        //
    } 

    public function store(Request $request)
    {
        $active = 'reportstandard'; 
        $data = $request->all();
        $str_from_date = $data['from_date'];
        $str_to_date = $data['to_date'];
        $sory_by = $data['sort_by']; 
        $incomes = $this->revenue->findByKey([getStringDate($str_from_date), getStringDate($str_to_date), $sory_by]);
        $expenses = $this->maintenance->all();
        $total_expense = 0;
        $total_income = 0;
        $net_income = 0;
        $key_sort = ['asc'=>'A-Z', 'desc'=>'Z-A'];
        $sort = $data['sort_by'];
        foreach($expenses as $item)
        {
            $total_expense += $item->unit_price * $item->amount;
        }

        foreach($incomes as $item)
        {
            $total_income += $item->amount;
        }

        $net_income = $total_income - $total_expense;
        
        return view('report.standard-report.result', compact('active', 'expenses', 'incomes', 'total_expense', 'total_income', 'net_income', 'key_sort', 'sort', 'data'));
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
