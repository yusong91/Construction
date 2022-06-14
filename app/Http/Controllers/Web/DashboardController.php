<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vanguard\Model\Equipment;
use Vanguard\Model\Maintenance;
use Vanguard\Http\Controllers\Controller;

class DashboardController extends Controller
{
     
    public function index()
    {
        $equipment_available = Equipment::where('status', 'available')->count();
        $equipment_rental = Equipment::where('status', 'rental')->count();
        $equipment_maintenance = Equipment::where('status', 'maintenance')->count();

        $claim = Maintenance::where('unclaim', 1)->count();
        $unclaim = Maintenance::where('unclaim', 0)->count();
        
        return view('dashboard.index', compact('equipment_available', 'equipment_rental', 'equipment_maintenance', 'claim', 'unclaim'));
    }

    public function userDashboard()
    {
        if (session()->has('verified')) {
            session()->flash('success', __('E-Mail verified successfully.'));
        }
        return view('dashboard.test'); 
    } 
}
 