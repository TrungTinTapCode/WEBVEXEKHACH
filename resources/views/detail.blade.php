<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết chuyến xe - COSMO BUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .trip-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .trip-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .price-tag {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545;
        }

        .seat-selection {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .legend-container {
            display: flex;
            gap: 40px;
            margin-bottom: 30px;
        }

        .legend-section {
            flex: 1;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .legend-box {
            width: 30px;
            height: 25px;
            border-radius: 8px;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .seat {
            width: 50px;
            height: 40px;
            margin: 4px;
            border-radius: 15px;
            border: 2px solid #ccc;
            display: inline-block;
            cursor: pointer;
            position: relative;
            background-color: #fff;
            transition: all 0.3s ease;
            display: flex; /* Thêm để căn giữa số ghế */
            justify-content: center; /* Thêm để căn giữa số ghế */
            align-items: center; /* Thêm để căn giữa số ghế */
            font-weight: bold; /* Thêm để số ghế nổi bật */
        }

        .seat.unavailable {
            background-color: #ccc;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .seat.single-small {
            border: 2px solid #dc3545;
        }

        .seat.available {
            border: 2px solid #d633ff;
            background-color: #fff; /* Đảm bảo màu nền là trắng cho ghế có sẵn */
        }

        .seat.selected {
            background-color: #32cd32;
            border-color: #32cd32;
        }

        .seat.selected::after {
            /* content: '✓'; -- Bỏ content này để hiện số ghế */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        /* Thêm style cho ghế đã đặt */
        .seat.booked {
            background-color: #ffc107; /* Màu vàng cho ghế đã đặt */
            border-color: #ffc107;
            cursor: not-allowed;
            color: #fff;
        }


        .bus-layout {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
        }

        .floor-section {
            background: #e9ecef;
            border-radius: 15px;
            padding: 20px;
            width: 200px;
            border: 2px solid #666;
        }

        .floor-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .driver-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .steering-wheel {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #333;
            position: relative;
            margin: 0 auto;
        }

        .steering-wheel::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border: 2px solid #333;
            border-radius: 50%;
        }

        .steering-wheel::after {
            content: '';
            position: absolute;
            width: 3px;
            height: 15px;
            background: #333;
            border-radius: 2px;
        }

        .seat-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .seat-row {
            display: flex;
            justify-content: center;
            gap: 6px;
        }

        .bottom-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 2px solid #000;
            margin-top: 20px;
        }

        .bottom-bar .total-text {
            font-weight: bold;
            font-style: italic;
            font-size: 18px;
        }

        .bottom-bar .continue-btn {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-style: italic;
            padding: 10px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .bottom-bar .continue-btn:hover {
            background-color: #0056b3;
        }

    /* Payment Methods and App Download */
        .payment-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .payment-method img {
            width: 100%;
            object-fit: contain;
        }

        .app-download {
            padding: 20px 0;
        }

        .qr-code img.qr-img {
            width: 200px;
            height: 200px;
            border-radius: 12px;
            border: 2px solid #ddd;
        }

        .store-buttons .store-img {
            width: auto;
            height: 90px;
            transition: transform 0.2s;
        }

        .store-buttons .store-img:hover {
            transform: scale(1.05);
        }

        .social-section {
            text-align: start;
            margin: 40px 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .social-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .facebook {
            background-color: #1877f2;
        }

        .youtube {
            background-color: #ff0000;
        }

        .tiktok {
            background-color: #000000;
        }
        .seat-map {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 cột ghế, bạn có thể điều chỉnh */
            gap: 10px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            margin-top: 20px;
        }

        .seat {
            width: 50px; /* Kích thước ghế */
            height: 50px;
            background-color: #ccc;
            border: 1px solid #aaa;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .seat.available {
            background-color: #d4edda; /* Màu xanh lá cây nhạt */
            border-color: #28a745;
            cursor: pointer;
        }

        .seat.booked {
            background-color: #f8d7da; /* Màu đỏ nhạt */
            border-color: #dc3545;
            cursor: not-allowed;
            opacity: 0.7;
        }

        .seat.selected {
            background-color: #007bff; /* Màu xanh dương */
            color: white;
            border-color: #0056b3;
        }
        .seat.unavailable { /* Cho ghế không khả dụng (ví dụ: không tồn tại thực) */
            background-color: #e2e6ea;
            border-color: #c6c6c6;
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="container my-4">
        <div class="trip-card p-4">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('storage/' . $schedule->route->image) }}" alt="Ảnh tuyến" class="trip-image">
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">{{ $schedule->bus->bus_name }}</h5>
                    <p class="text-muted mb-2">{{ $schedule->bus->bus_type }}</p>
                    <p class="mb-2">🕐 {{ \Carbon\Carbon::parse($schedule->departure_time)->format('H:i d/m/Y') }} • {{ $schedule->route->departure }}</p>
                    <p class="mb-2">🕕 {{ \Carbon\Carbon::parse($schedule->arrival_time)->format('H:i d/m/Y') }} • {{ $schedule->route->destination }}</p>
                    <p class="text-muted">Còn {{ $availableSeats }} chỗ trống</p>
                </div>
                <div class="col-md-3 text-end">
                    <div class="price-tag">Từ {{ number_format($schedule->route->price) }}đ</div>
                </div>
            </div>
        </div>

        <div class="seat-selection">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="text-success">ĐÓN / TRẢ TẬN NƠI</h5>
                    <p class="text-muted">*Vé thuộc chuyến {{ $schedule->route->departure }} - {{ $schedule->route->destination }} ({{ \Carbon\Carbon::parse($schedule->departure_time)->format('d/m/Y') }})</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="fw-bold">KHÔNG CẦN THANH TOÁN TRƯỚC</p>
                </div>
            </div>

            <div class="legend-container">
                <div class="legend-section">
                    <div class="legend-item">
                        <div class="legend-box" style="background-color: #ccc; border: 2px solid #999;"></div>
                        <span>Ghế không bán</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #dc3545; background: white;"></div>
                        <span>Phòng đơn nhỏ 1 khách</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #d633ff; background: white;"></div>
                        <span>Phòng đôi 2 khách<br>Phòng đơn 1 khách</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #32cd32; background: #32cd32;"></div>
                        <span>Ghế đang chọn</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="background-color: #ffc107; border: 2px solid #ffc107;"></div>
                        <span>Ghế đã đặt</span>
                    </div>
                </div>

                <div class="bus-layout">
                    <div class="floor-section">
                        <div class="floor-title">Tầng Dưới</div>
                        <div class="driver-section">
                            <div class="steering-wheel"></div>
                        </div>
                        <div class="seat-column">
                            @php
                                $lowerDeckSeats = $seats->filter(function($seat) {
                                    // Giả định seat_number có thể cho biết tầng. Ví dụ: A1, A2, B1, B2...
                                    // Hoặc bạn có thể thêm cột 'deck' vào bảng seats
                                    // Hiện tại, mình sẽ chia đại khái làm 2 phần
                                    return (int)filter_var($seat->seat_number, FILTER_SANITIZE_NUMBER_INT) <= ($schedule->bus->total_seats / 2);
                                })->sortBy('seat_number'); // Sắp xếp ghế theo số ghế
                                $lowerDeckSeatPairs = $lowerDeckSeats->chunk(2);
                            @endphp

                            @foreach ($lowerDeckSeatPairs as $pair)
                                <div class="seat-row">
                                    @foreach ($pair as $seat)
                                        <div class="seat
                                            @if (!$seat->is_available) unavailable
                                            @elseif ($seat->is_booked) booked
                                            @else available @endif"
                                            data-seat-id="{{ $seat->seat_id }}"
                                            data-price="{{ $schedule->route->price }}"
                                            onclick="toggleSeat(this)">
                                            {{ $seat->seat_number }}
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="floor-section">
                        <div class="floor-title">Tầng Trên</div>
                        <div class="seat-column">
                            @php
                                $upperDeckSeats = $seats->filter(function($seat) {
                                    return (int)filter_var($seat->seat_number, FILTER_SANITIZE_NUMBER_INT) > ($schedule->bus->total_seats / 2);
                                })->sortBy('seat_number'); // Sắp xếp ghế theo số ghế
                                $upperDeckSeatPairs = $upperDeckSeats->chunk(2);
                            @endphp

                            @foreach ($upperDeckSeatPairs as $pair)
                                <div class="seat-row">
                                    @foreach ($pair as $seat)
                                        <div class="seat
                                            @if (!$seat->is_available) unavailable
                                            @elseif ($seat->is_booked) booked
                                            @else available @endif"
                                            data-seat-id="{{ $seat->seat_id }}"
                                            data-price="{{ $schedule->route->price }}"
                                            onclick="toggleSeat(this)">
                                            {{ $seat->seat_number }}
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-bar">
                <span class="total-text">Tổng cộng: <span id="totalPrice">0đ</span></span>
                <form id="bookingForm" action="{{ route('book.seats') }}" method="POST">
                    @csrf
                    <input type="hidden" name="schedule_id" value="{{ $schedule->schedule_id }}">
                    <input type="hidden" name="selected_seat_ids" id="selectedSeatIds">
                    <button type="submit" class="continue-btn" onclick="return validateAndSubmitForm()">Tiếp tục</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Phương thức thanh toán</h6>
                    <div class="payment-methods">
                        <div class="payment-method">
                            <img src="{{ asset('img/Bank-logo/payment_all.png') }}" alt="All-logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Tải ứng dụng COSMO BUS</h6>
                    <div class="app-download">
                        <div class="row justify-content-start">
                            <div class="col-12 col-md-5 text-center text-md-start mb-3 mb-md-0">
                                <div class="qr-code">
                                    <img src="{{ asset('img/Bank-logo/Cosmo-QR.jpg') }}" alt="QR Code" class="qr-img">
                                </div>
                            </div>

                            <div class="col-12 col-md-7 text-center text-md-start">
                                <div class="store-buttons d-flex flex-column align-items-center align-items-md-start gap-3">
                                    <img src="{{ asset('img/Bank-logo/downlode-appstore.webp') }}" alt="Download on the App Store" class="store-img">
                                    <img src="{{ asset('img/Bank-logo/downlode-googleplay.webp') }}" alt="Get it on Google Play" class="store-img">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="social-section">
                        <h6 class="fw-bold">Kết nối với COSMO BUS</h6>
                        <div class="social-links justify-content-start">
                            <a href="#" class="social-icon facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-icon youtube">
                                <i class="bi bi-youtube"></i>
                            <a href="#" class="social-icon tiktok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Lấy giá vé từ PHP
            const seatPrice = {{ $schedule->route->price }};
            let selectedSeats = [];

            function toggleSeat(seatElement) {
                // Không cho phép chọn ghế không bán hoặc đã đặt
                if (seatElement.classList.contains('unavailable') || seatElement.classList.contains('booked')) {
                    return;
                }

                const seatId = seatElement.dataset.seatId;

                if (seatElement.classList.contains('selected')) {
                    seatElement.classList.remove('selected');
                    seatElement.classList.add('available');
                    selectedSeats = selectedSeats.filter(id => id !== seatId); // Xóa khỏi danh sách
                } else if (seatElement.classList.contains('available')) {
                    seatElement.classList.remove('available');
                    seatElement.classList.add('selected');
                    selectedSeats.push(seatId); // Thêm vào danh sách
                }
                updateTotalPrice();
            }

            function updateTotalPrice() {
                const total = selectedSeats.length * seatPrice;
                document.getElementById('totalPrice').textContent = total.toLocaleString('vi-VN') + 'đ';
            }

            function validateAndSubmitForm() {
                if (selectedSeats.length === 0) {
                    alert('Vui lòng chọn ít nhất một ghế để tiếp tục đặt vé!');
                    return false; // Ngăn chặn form submit
                }
                // Gán danh sách ID ghế đã chọn vào input hidden
                document.getElementById('selectedSeatIds').value = JSON.stringify(selectedSeats);
                return true; // Cho phép form submit
            }

            // Gọi hàm này khi trang được tải để cập nhật tổng tiền ban đầu (nếu có ghế đã chọn sẵn, mặc dù ở đây không có)
            document.addEventListener('DOMContentLoaded', function() {
                updateTotalPrice(); // Đảm bảo tổng tiền hiển thị 0đ khi tải trang
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    </div>
    @include('footer')
</body>
</html>