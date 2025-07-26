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
        if ($request->has('cancel')) {
            $booking->update(['status' => 'cancelled', 'payment_status' => 'refunded']);
            return back()->with('success', 'Đã hủy vé thành công!');
        }

        $nextStatus = [
            'pending' => 'confirmed',
            'confirmed' => 'completed',
        ];

        $current = $booking->status;
        if (isset($nextStatus[$current])) {
            $newStatus = $nextStatus[$current];
            $updateData = ['status' => $newStatus];

            if ($newStatus === 'completed') {
                $updateData['payment_status'] = 'paid';
            }

            $booking->update($updateData);
            return back()->with('success', 'Cập nhật trạng thái thành công!');
        }

        return back()->with('info', 'Không thể cập nhật trạng thái.');
    }
}