<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\Account;

class HistoryController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $customer = $user->customer;

    if (!$customer) {
        return view('user.history', [
            'currentBookings' => collect(),
            'completedBookings' => collect(),
            'cancelledBookings' => collect()
        ]);
    }

    // Sắp tới: pending hoặc confirmed
    $currentBookings = Booking::with(['schedule.route', 'details.seat'])
        ->where('customer_id', $customer->customer_id)
        ->whereIn('status', ['pending', 'confirmed'])
        ->get();

    // Đã đi
    $completedBookings = Booking::with(['schedule.route', 'details.seat'])
        ->where('customer_id', $customer->customer_id)
        ->where('status', 'completed')
        ->get();

    // Đã huỷ
    $cancelledBookings = Booking::with(['schedule.route', 'details.seat'])
        ->where('customer_id', $customer->customer_id)
        ->where('status', 'cancelled')
        ->get();

    return view('user.history', compact('currentBookings', 'completedBookings', 'cancelledBookings'));
}

}