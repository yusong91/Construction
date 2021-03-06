<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vanguard\Model\Equipment;
use Vanguard\Model\Maintenance; 
use Vanguard\Model\Revenue;
use Carbon\Carbon;
use Vanguard\Http\Controllers\Controller;

class DashboardController extends Controller
{
     
    public function index()
    {
        $equipment_available = Equipment::where(['status'=>'available', 'sold'=> 0])->count();
        $equipment_rental = Equipment::where(['status'=>'rental', 'sold'=> 0])->count();
        $equipment_maintenance = Equipment::where(['status'=>'maintenance', 'sold'=> 0])->count();

        $claim = Maintenance::where(['unclaim'=> 1])->count();
        $unclaim = Maintenance::where(['unclaim'=> 0])->count();

        $raw_income_and_expense = Equipment::with(['child_revenue', 'child_maintenance'])->where('sold', 0)->get();
        $income_and_expense = [['Equipment', 'Income', 'Expenses']];

        $current_amount = getStringDate(Carbon::now());
        //Carbon::now()->subDays(7)


        $revenue_by_date = [['Date', 'Revenue']];
        $revenue = Revenue::whereMonth('from_date', Carbon::now()->month)->get()->groupBy(function ($r) {

            return $r->from_date;
        });

        foreach ($revenue as $key => $values) {

            $amount = 0;
            foreach ($values as $item) {
                $amount += $item->amount;   
            }
            $revenue_by_date[] = [getDateFormat($key), $amount];
        }

        if(count($revenue_by_date) == 1)
        {
            $revenue_by_date = [
                                    ['Date', 'Revenue'],
                                    [$current_amount,  0]
                                ];
        }

        foreach ($raw_income_and_expense as $items) {
 
            $total_revenue = 0;
            $total_maintenance = 0.0;
            foreach ($items->child_revenue as $item) {
                $total_revenue += $item->amount;
            }
            foreach ($items->child_maintenance as $item) {
                $total_maintenance += $item->amount;
            }
            $income_and_expense[] = [$items->equipment_id, $total_revenue, $total_maintenance];
        }

        
        return view('dashboard.index', compact('equipment_available', 'equipment_rental', 'equipment_maintenance', 'claim', 'unclaim', 'income_and_expense', 'revenue_by_date'));
    }

    public function userDashboard()
    {
        if (session()->has('verified')) {
            session()->flash('success', __('E-Mail verified successfully.'));
        }
        return view('dashboard.test'); 
    } 
}
 