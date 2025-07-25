<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DetailController extends Controller
{
public function show($id)
{
    $schedule = Schedule::with(['bus.seats', 'route'])->findOrFail($id);

    // Sử dụng optional để tránh lỗi nếu bus null
    $seats = $schedule->bus->seats ?? collect();

    $availableSeats = $seats->where('is_available', true)->where('is_booked', false)->count();

    return view('detail', [
        'schedule' => $schedule,
        'seats' => $seats,
        'availableSeats' => $availableSeats
    ]);
}



}