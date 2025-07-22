<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('report_date', 'desc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function revenue(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        
        $payments = Payment::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'completed')
            ->with('booking')
            ->get();
            
        $totalRevenue = $payments->sum('amount');
        
        return view('admin.reports.revenue', compact('payments', 'totalRevenue', 'startDate', 'endDate'));
    }

    public function trips(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        
        // Lấy danh sách tuyến đường kèm thông tin booking thông qua schedule
        $routes = Route::with(['schedules' => function($query) use ($startDate, $endDate) {
            $query->withCount(['bookings' => function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->with(['bookings' => function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate])
                ->with('payments');
            }]);
        }])->get();
        
        // Tính toán số lượng booking và doanh thu cho từng route
        $routes->each(function($route) {
            $route->bookings_count = $route->schedules->sum('bookings_count');
            
            $route->total_revenue = $route->schedules->reduce(function($carry, $schedule) {
                return $carry + $schedule->bookings->sum(function($booking) {
                    return $booking->payments->sum('amount');
                });
            }, 0);
            
            // Gom tất cả bookings của các schedules vào một collection
            $route->all_bookings = $route->schedules->flatMap->bookings;
        });
        
        return view('admin.reports.trips', compact('routes', 'startDate', 'endDate'));
    }

}