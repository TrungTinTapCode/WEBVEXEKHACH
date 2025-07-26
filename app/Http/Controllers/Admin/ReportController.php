<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
        $startDate = $request->input('start_date', \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Lấy các booking đã thanh toán trong khoảng thời gian lọc
        $bookings = Booking::whereBetween('created_at', [$startDate, $endDate])
            ->where('payment_status', 'paid')
            ->with(['schedule.route'])
            ->get();

        $totalRevenue = $bookings->sum('total_amount');

        return view('admin.reports.revenue', compact('bookings', 'totalRevenue', 'startDate', 'endDate'));
    }

    public function trips(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        $routes = Route::with(['schedules' => function($query) use ($startDate, $endDate) {
            $query->with(['bookings' => function($q) use ($startDate, $endDate) {
                $q->whereBetween('created_at', [$startDate, $endDate]);
            }]);
        }])->get();

        // Tính toán số lượng booking và doanh thu cho từng route
        $routes->each(function($route) {
            // Tổng số booking của tất cả schedule thuộc route này
            $route->bookings_count = $route->schedules->sum(function($schedule) {
                return $schedule->bookings->count();
            });

            // Tổng doanh thu của tất cả booking thuộc route này
            $route->total_revenue = $route->schedules->reduce(function($carry, $schedule) {
                return $carry + $schedule->bookings->sum('total_amount');
            }, 0);

            // Gom tất cả bookings của các schedules vào một collection
            $route->all_bookings = $route->schedules->flatMap->bookings;
        });

        return view('admin.reports.trips', compact('routes', 'startDate', 'endDate'));
    }

}