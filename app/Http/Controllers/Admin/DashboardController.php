<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRoutes = Route::count();
        $totalBuses = Bus::count();
        
        $todayBookings = Booking::whereDate('created_at', today())->count();
        $todayRevenue = Booking::whereDate('created_at', today())->sum('total_amount');
        
        $recentBookings = Booking::with('customer')
            ->latest()
            ->take(5)
            ->get();
            
        // Prepare data for revenue chart (last 7 days)
        $revenueChart = [
            'labels' => [],
            'data' => []
        ];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $revenueChart['labels'][] = $date->format('d/m');
            $revenueChart['data'][] = Booking::whereDate('created_at', $date)->sum('total_amount');
        }
        
        return view('admin.dashboard.index', compact(
            'totalRoutes',
            'totalBuses',
            'todayBookings',
            'todayRevenue',
            'recentBookings',
            'revenueChart'
        ));
    }
}