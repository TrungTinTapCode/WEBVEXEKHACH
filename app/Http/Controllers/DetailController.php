<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function show($id)
    {
        $schedule = Schedule::with(['route', 'bus', 'seats'])
            ->findOrFail($id);

        $seats = $schedule->seats->map(function ($seat) {
            $seat->is_booked = $seat->bookingDetails()->exists();
            return $seat;
        });

        $availableSeats = $schedule->seats->where('is_available', true)
            ->where('is_booked', false)
            ->count();

        return view('detail', compact('schedule', 'seats', 'availableSeats'));
    }

    public function book(Request $request, $schedule_id)
    {
        $request->validate([
            'selected_seat_ids' => 'required|json',
        ]);

        $account = auth()->user();
        if (!$account) {
            return redirect()->route('login.user')->with('error', 'Vui lòng đăng nhập để đặt vé');
        }

        $customer = Customer::where('phone_number', $account->phone_number)->first();
        if (!$customer) {
            return redirect()->route('home')->with('error', 'Không tìm thấy thông tin khách hàng');
        }

        try {
            DB::beginTransaction(); // Bắt đầu transaction

            $booking = Booking::create([
                'customer_id' => $customer->customer_id,
                'schedule_id' => $schedule_id,
                'booking_code' => Str::upper(Str::random(8)),
                'total_amount' => $this->calculateTotal($request, $schedule_id),
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);

            $selectedSeatIds = json_decode($request->selected_seat_ids, true);
            $pricePerSeat = $booking->total_amount / count($selectedSeatIds);

            foreach ($selectedSeatIds as $seatId) {
                BookingDetail::create([
                    'booking_id' => $booking->booking_id,
                    'seat_id' => $seatId,
                    'passenger_name' => 'Chưa xác định',
                    'passenger_phone' => 'Chưa xác định',
                    'price' => $pricePerSeat,
                    'ticket_number' => Str::random(10),
                ]);
            }

            DB::commit(); // Commit transaction nếu thành công

            // Bỏ dòng dd() debug này
            // \Log::info('Redirecting to payment offline', ['booking_id' => $booking->id]);
            // dd(route('payment.offline', ['booking' => $booking->id]));

            return redirect()->route('payment.offline', $booking);

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback nếu có lỗi
            \Log::error('Booking error: ' . $e->getMessage());
            return back()->with('error', 'Lỗi đặt vé: ' . $e->getMessage());
        }
    }

    private function calculateTotal(Request $request, $schedule_id)
    {
        $schedule = Schedule::findOrFail($schedule_id);
        $seatCount = count(json_decode($request->selected_seat_ids));
        return $schedule->route->price * $seatCount;
    }
}