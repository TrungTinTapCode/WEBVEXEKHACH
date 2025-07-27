<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt vé - COSMO BUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .breadcrumb-item a {
            color: #0090ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .required {
            color: red;
            font-weight: bold;
        }

        .card-header {
            background-color: #fff;
            font-weight: 600;
        }

        .invalid-feedback {
            display: block;
        }

        .btn-confirm {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .btn-payment {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .seat-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .seat-badge {
            font-size: 14px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin đặt vé</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Cột bên trái: Thông tin liên hệ -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Thông tin hành khách</div>
                    <div class="card-body">
                        <form id="contactForm" action="{{ route('booking.confirm', $booking) }}" method="POST">
                            @csrf

                            <!-- Hiển thị thông tin ghế đã chọn -->
                            <div class="seat-info mb-4">
                                <h6>Thông tin ghế đã chọn:</h6>
                                <div class="d-flex flex-wrap">
                                    @foreach($booking->details as $detail)
                                        <span class="badge bg-primary seat-badge">
                                            Ghế {{ $detail->seat->seat_number }} - {{ number_format($detail->price) }}đ
                                        </span>
                                    @endforeach
                                </div>
                                <div class="fw-bold mt-2">
                                    Tổng cộng: {{ number_format($booking->total_amount) }}đ
                                </div>
                            </div>

                            <!-- Form thông tin khách hàng -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Họ tên <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{ $booking->customer->full_name ?? old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Số điện thoại <span class="required">*</span></label>
                                        <input type="tel" class="form-control" name="phone"
                                               value="{{ $booking->customer->phone_number ?? old('phone') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                               value="{{ $booking->customer->email ?? old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CMND/CCCD</label>
                                        <input type="text" class="form-control" name="id_card"
                                               value="{{ $booking->customer->id_card ?? old('id_card') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{ $booking->customer->address ?? old('address') }}">
                            </div>

                            <div class="alert alert-success mt-3">
                                ✅ Thông tin đơn hàng sẽ được gửi đến số điện thoại và email bạn cung cấp.
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="submit" class="btn btn-confirm px-4">
                                    <i class="bi bi-check-circle"></i> Xác nhận đặt vé
                                </button>
                                <a href="{{ route('booking.payment', ['booking' => $booking->booking_id]) }}" class="btn btn-payment px-4">
                                    <i class="bi bi-credit-card"></i> Thanh toán online
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cột bên phải: Thông tin chuyến đi -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-muted">
                                <i class="bi bi-bus-front"></i>
                                <strong>{{ $booking->schedule->departure_time->format('l, d/m/Y') }}</strong>
                            </div>
                            <span class="badge bg-warning text-dark">Chưa thanh toán</span>
                        </div>

                        <div class="d-flex mb-3">
                            @if($booking->schedule->bus->image)
                                <img src="{{ asset('storage/' . $booking->schedule->bus->image) }}" alt="Bus Image" class="me-3 rounded" width="100" height="60">
                            @endif
                            <div>
                                <div class="fw-bold">{{ $booking->schedule->bus->bus_name }}</div>
                                <div class="text-muted small">{{ $booking->schedule->bus->bus_type }}</div>
                                <div class="text-muted small">
                                    <i class="bi bi-person"></i> {{ $booking->details->count() }} hành khách
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-2">
                            <div class="d-flex">
                                <div class="text-center me-3" style="width: 60px;">
                                    <div class="fw-bold">{{ $booking->schedule->departure_time->format('H:i') }}</div>
                                    <div class="text-muted small">({{ $booking->schedule->departure_time->format('d/m') }})</div>
                                    <div class="my-1">
                                        <span class="badge bg-primary rounded-circle" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $booking->schedule->route->departure }}</div>
                                    <div class="text-muted small">
                                        {{ $booking->schedule->departure_location }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1">
                            <div class="d-flex">
                                <div class="text-center me-3" style="width: 60px;">
                                    <div class="fw-bold text-danger">{{ $booking->schedule->arrival_time->format('H:i') }}</div>
                                    <div class="text-muted small">({{ $booking->schedule->arrival_time->format('d/m') }})</div>
                                    <div class="my-1">
                                        <span class="badge bg-danger rounded-circle" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $booking->schedule->route->destination }}</div>
                                    <div class="text-muted small">
                                        {{ $booking->schedule->arrival_location }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate form
            const name = this.querySelector('input[name="name"]').value;
            const phone = this.querySelector('input[name="phone"]').value;
            const email = this.querySelector('input[name="email"]').value;

            if (!name || !phone || !email) {
                alert('Vui lòng điền đầy đủ thông tin bắt buộc!');
                return;
            }

            // Validate phone format
            const phoneRegex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
            if (!phoneRegex.test(phone)) {
                alert('Số điện thoại không hợp lệ!');
                return;
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Email không hợp lệ!');
                return;
            }

            // Hiển thị thông báo xác nhận
            if (confirm('Bạn có chắc chắn muốn đặt vé? Sẽ có người gọi điện xác nhận trong vòng 5 phút.')) {
                this.submit();
            }
        });
    </script>
</body>
</html>
