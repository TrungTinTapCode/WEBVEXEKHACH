<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'schedule'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.booking.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['customer', 'schedule.route', 'details.seat', 'payments']);
        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);
        
        $booking->update(['status' => $validated['status']]);
        
        return back()->with('success', 'Cập nhật trạng thái thành công');
    }
}