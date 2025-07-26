<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class userBookingController extends Controller
{
    public function paymentOffline(Booking $booking)
    {
        // Load các quan hệ cần thiết
        $booking->load([
            'customer',
            'schedule.route', 
            'schedule.bus', 
            'details.seat'
        ]);
        
        // Nếu không có customer, khởi tạo object rỗng để tránh lỗi
        if (!$booking->customer) {
            $booking->setRelation('customer', new Customer());
        }
        
        return view('payment_off', compact('booking'));
    }

    public function confirmBooking(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Cập nhật hoặc tạo mới thông tin khách hàng
        $customer = Customer::updateOrCreate(
            ['phone_number' => $request->phone],
            [
                'full_name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
            ]
        );

        // Cập nhật booking với customer_id mới
        $booking->update([
            'customer_id' => $customer->customer_id,
            'status' => 'confirmed',
            'payment_status' => 'unpaid',
            'notes' => 'Sẽ có người gọi điện xác nhận đặt vé sau 5 phút',
        ]);

        return redirect()->route('home')->with('success', 'Đặt vé thành công! Vui lòng chờ điện thoại xác nhận.');
    }

    public function payment(Booking $booking)
    {
        $booking->load([
            'customer',
            'schedule.route',
            'schedule.bus', 
            'details.seat'
        ]);
            
        $totalAmount = $booking->total_amount ?: $booking->details->sum('price');
        
        return view('payment', [
            'booking' => $booking,
            'totalAmount' => $totalAmount
        ]);
    }

    public function processPayment(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $booking->update([
            'payment_status' => 'paid',
            'status' => 'confirmed',
        ]);

        Payment::create([
            'booking_id' => $booking->booking_id,
            'amount' => $booking->total_amount,
            'payment_method' => $request->payment_method,
            'transaction_code' => Str::random(12),
            'status' => 'completed',
        ]);

        return redirect()->route('home')->with('success', 'Thanh toán thành công! Vé đã được xác nhận.');
    }
}