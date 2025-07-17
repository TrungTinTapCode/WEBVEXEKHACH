<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['route', 'bus'])->latest()->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $routes = Route::all();
        $buses = Bus::all();
        return view('admin.schedules.create', compact('routes', 'buses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'bus_id' => 'required|exists:buses,bus_id',
            'departure_time' => 'required|date|after:now',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được tạo');
    }

    public function edit(Schedule $schedule)
    {
        $routes = Route::all();
        $buses = Bus::all();
        return view('admin.schedules.edit', compact('schedule', 'routes', 'buses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'bus_id' => 'required|exists:buses,bus_id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được cập nhật');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được xóa');
    }

    public function updateStatus(Schedule $schedule, $status)
    {
        $validStatuses = ['scheduled', 'departed', 'arrived', 'cancelled'];
        
        if (!in_array($status, $validStatuses)) {
            return back()->with('error', 'Trạng thái không hợp lệ');
        }

        $schedule->update(['status' => $status]);
        return back()->with('success', 'Trạng thái lịch trình đã được cập nhật');
    }
}