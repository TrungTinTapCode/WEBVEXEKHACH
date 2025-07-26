<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Route;
use App\Models\Bus;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Hiển thị danh sách lịch trình.
     */
    public function index()
    {
        $schedules = Schedule::with(['route', 'bus'])->orderBy('departure_time', 'desc')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Hiển thị form tạo mới lịch trình.
     */
    public function create()
    {
        $routes = Route::all(); // Lấy danh sách tuyến
        $buses = Bus::all();    // Lấy danh sách xe buýt
        return view('admin.schedules.create', compact('routes', 'buses'));
    }

    /**
     * Lưu lịch trình mới vào database.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'bus_id' => 'required|exists:buses,bus_id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $schedule = Schedule::create([
    'route_id' => $request->route_id,
    'bus_id' => $request->bus_id,
    'departure_time' => $request->departure_time,
    'arrival_time' => $request->arrival_time,
    'status' => 'scheduled',
]);
        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được thêm thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa lịch trình.
     */
    public function edit(Schedule $schedule)
    {
        $routes = Route::all();
        $buses = Bus::all();
        return view('admin.schedules.edit', compact('schedule', 'routes', 'buses'));
    }

    /**
     * Cập nhật thông tin lịch trình.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'bus_id' => 'required|exists:buses,bus_id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $schedule->route_id = $request->route_id;
        $schedule->bus_id = $request->bus_id;
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->status = $request->status;

        if (in_array($request->status, ['departed', 'arrived', 'cancelled'])) {
    $schedule->is_active = false;
} else {
    $schedule->is_active = true;
}
        if ($request->status === 'arrived') {
        $schedule->completed = true;

        // Cập nhật tất cả bookings của schedule này thành completed
        $schedule->bookings()->where('status', 'pending')->update([
            'status' => 'completed'
        ]);
    } else {
        $schedule->completed = false;
    }

$schedule->save();

        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được cập nhật');
    }

    /**
     * Xoá lịch trình.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Lịch trình đã được xóa');
    }

    /**
     * Cập nhật trạng thái lịch trình.
     */
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
