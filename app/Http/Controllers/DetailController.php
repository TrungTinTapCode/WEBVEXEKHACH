<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show($id)
    {
        // Lấy thông tin chuyến xe, bus, danh sách ghế
        $trip = Schedule::with(['bus', 'seats'])->findOrFail($id);

        // Đếm số ghế trống
        $availableSeats = $trip->seats->where('status', 'available')->count();

        return view('detail', [
            'trip' => $trip,
            'seats' => $trip->seats,
            'availableSeats' => $availableSeats
        ]);
    }
}