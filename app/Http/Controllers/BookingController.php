<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Seat;
use App\Models\Schedule;
use App\Models\Customer; // Đảm bảo đã import Customer model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Để tạo booking_code ngẫu nhiên
use Illuminate\Support\Facades\DB; // Để sử dụng transaction
use Illuminate\Validation\ValidationException; // Thêm import này

class BookingController extends Controller
{
    // Phương thức xử lý hiển thị danh sách đặt chỗ (có thể đã có từ admin)
    public function index()
    {
        // Logic để hiển thị danh sách các booking
        // Ví dụ: $bookings = Booking::all();
        // return view('admin.booking.index', compact('bookings'));
    }

    // Phương thức xử lý hiển thị chi tiết đặt chỗ (có thể đã có từ admin)
    public function show($id)
    {
        // Logic để hiển thị chi tiết booking
        // Ví dụ: $booking = Booking::findOrFail($id);
        // return view('admin.booking.show', compact('booking'));
    }

    /**
     * Xử lý lưu trữ thông tin đặt vé.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Xác thực dữ liệu đầu vào
        try {
            $request->validate([
                'schedule_id' => 'required|exists:schedules,schedule_id',
                'selected_seat_ids' => 'required|json', // Nhận JSON string của mảng ID ghế
                // Thêm validation cho thông tin khách hàng nếu chưa đăng nhập
                'customer_name' => 'nullable|string|max:255',
                'customer_phone' => ['nullable', 'string', 'max:20', 'regex:/^0\d{9,10}$/'], // Ví dụ: số điện thoại 10 hoặc 11 số, bắt đầu bằng 0
                'customer_email' => 'nullable|email|max:255',
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }

        $selectedSeatIds = json_decode($request->input('selected_seat_ids'), true); // Thêm true để decode thành mảng kết hợp

        if (empty($selectedSeatIds)) {
            return back()->with('error', 'Vui lòng chọn ít nhất một ghế để đặt.');
        }

        $customer = null;
        if (Auth::check()) {
            $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập (từ bảng 'account')
            // Tìm hoặc tạo khách hàng dựa trên thông tin người dùng đã đăng nhập
            $customer = Customer::firstOrCreate(
                ['phone_number' => $user->phone_number], // Sử dụng phone_number để tìm kiếm
                [
                    'full_name' => $user->name ?? 'Khách hàng', // Dùng tên từ Account nếu có
                    'email' => $user->email ?? null, // Dùng email từ Account nếu có
                    'id_card' => null, // Bạn có thể thêm trường này vào form đăng ký/profile nếu cần
                    'address' => $user->dia_chi ?? null, // Dùng địa chỉ từ Account nếu có
                ]
            );
        } else {
            // Nếu người dùng chưa đăng nhập, sử dụng thông tin từ form
            // Thêm validation cho thông tin khách hàng nếu chưa đăng nhập
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_phone' => ['required', 'string', 'max:20', 'unique:customers,phone_number', 'regex:/^0\d{9,10}$/'],
                'customer_email' => 'required|email|max:255|unique:customers,email',
            ]);

            $customer = Customer::firstOrCreate(
                ['phone_number' => $request->customer_phone],
                [
                    'full_name' => $request->customer_name,
                    'email' => $request->customer_email,
                    'id_card' => null, // Có thể thêm vào form nếu cần
                    'address' => null, // Có thể thêm vào form nếu cần
                ]
            );
        }

        // Kiểm tra nếu không tìm thấy hoặc tạo được khách hàng
        if (!$customer) {
            return back()->with('error', 'Không thể tạo hoặc tìm thấy thông tin khách hàng.');
        }

        $schedule = Schedule::findOrFail($request->schedule_id);
        $totalAmount = 0;

        // Bắt đầu một database transaction để đảm bảo tính toàn vẹn dữ liệu
        DB::beginTransaction();

        try {
            // 2. Tạo bản ghi Booking chính
            $bookingCode = 'BKG-' . Str::upper(Str::random(8)); // Tạo mã booking ngẫu nhiên
            while (Booking::where('booking_code', $bookingCode)->exists()) {
                $bookingCode = 'BKG-' . Str::upper(Str::random(8)); // Đảm bảo mã là duy nhất
            }

            $booking = Booking::create([
                'customer_id' => $customer->customer_id,
                'schedule_id' => $schedule->schedule_id,
                'booking_code' => $bookingCode,
                'total_amount' => 0, // Sẽ cập nhật sau khi tính tổng từ booking_details
                'status' => 'pending', // Trạng thái đặt chỗ ban đầu
                'payment_status' => 'unpaid', // Trạng thái thanh toán ban đầu
                'notes' => Auth::check() ? 'Đặt vé bởi thành viên' : 'Đặt vé bởi khách vãng lai',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 3. Xử lý từng ghế đã chọn
            foreach ($selectedSeatIds as $seatId) {
                // Sử dụng lockForUpdate() để ngăn chặn race condition mạnh mẽ hơn
                $seat = Seat::where('seat_id', $seatId)
                            ->where('bus_id', $schedule->bus_id) // Đảm bảo ghế thuộc xe của chuyến này
                            ->where('is_available', true)
                            ->where('is_booked', false)
                            ->lockForUpdate() // Khóa hàng ghế để tránh người khác đặt cùng lúc
                            ->first();

                if (!$seat) {
                    DB::rollBack();
                    // Lấy số ghế để hiển thị thông báo cụ thể hơn
                    $failedSeat = Seat::find($seatId);
                    return back()->with('error', 'Ghế ' . ($failedSeat ? $failedSeat->seat_number : $seatId) . ' không khả dụng hoặc đã có người đặt.');
                }

                // Cập nhật trạng thái ghế
                $seat->is_booked = true;
                $seat->save();

                // Tạo bản ghi BookingDetail cho từng ghế
                // Lấy giá vé từ route của schedule
                $ticketPrice = $schedule->route->price;

                BookingDetail::create([
                    'booking_id' => $booking->booking_id,
                    'seat_id' => $seat->seat_id,
                    'passenger_name' => $request->input('customer_name', $customer->full_name), // Ưu tiên tên từ form nếu có, nếu không thì từ customer
                    'passenger_phone' => $request->input('customer_phone', $customer->phone_number), // Ưu tiên sđt từ form nếu có, nếu không thì từ customer
                    'price' => $ticketPrice, // Sử dụng giá từ Route
                    'ticket_number' => 'TKT-' . Str::upper(Str::random(10)), // Tạo số vé ngẫu nhiên
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $totalAmount += $ticketPrice;
            }

            // Cập nhật tổng số tiền cho booking chính
            $booking->total_amount = $totalAmount;
            $booking->save();

            DB::commit(); // Hoàn tất transaction

            // Chuyển hướng đến trang thanh toán với booking_code
            return redirect()->route('payment', ['booking_code' => $bookingCode])
                             ->with('success', 'Bạn đã đặt vé thành công! Vui lòng hoàn tất thanh toán.');

        } catch (\Exception $e) {
            DB::rollBack(); // Hoàn tác tất cả các thay đổi nếu có lỗi
            // Ghi lại lỗi để dễ dàng gỡ lỗi
            \Log::error('Lỗi khi đặt vé: ' . $e->getMessage() . ' at line ' . $e->getLine() . ' in file ' . $e->getFile());
            return back()->with('error', 'Có lỗi xảy ra trong quá trình đặt vé. Vui lòng thử lại. Chi tiết lỗi: ' . $e->getMessage());
        }
    }

    /**
     * Hiển thị form thanh toán cho một đặt chỗ cụ thể.
     *
     * @param  string  $booking_code
     * @return \Illuminate\Http\Response
     */
    public function showPaymentForm($booking_code)
    {
        // Tải đặt chỗ và các mối quan hệ cần thiết
        $booking = Booking::where('booking_code', $booking_code)
                        ->with(['customer', 'details.seat', 'schedule.route', 'schedule.bus'])
                        ->firstOrFail();

        // Kiểm tra quyền truy cập (chỉ chủ sở hữu đặt chỗ mới được xem trang thanh toán này)
        // Nếu bạn có Auth::user() và customer_id trong booking liên kết với user_id của Auth::user()
        if (Auth::check() && $booking->customer->phone_number !== Auth::user()->phone_number) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào đặt chỗ này.');
        }

        // Nếu khách hàng là khách vãng lai (chưa đăng nhập), bạn có thể thêm logic xác minh khác tại đây nếu cần
        // Ví dụ: kiểm tra session hoặc thông tin đã gửi qua email/SMS

        // Kiểm tra trạng thái đặt chỗ, nếu đã thanh toán thì không cho vào lại
        if ($booking->payment_status === 'paid') {
            return redirect()->route('history')->with('info', 'Đặt chỗ này đã được thanh toán.');
        }

        return view('payment', compact('booking'));
    }
}