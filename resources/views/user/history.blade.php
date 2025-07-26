<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đơn hàng của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            font-family: system-ui, sans-serif;
            background-color: #fff;
            color: #000;
        }

        .sidebar {
            background-color: #dbd7d7ff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 0;
            color: #000;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar a i {
            font-size: 22px;
            margin-right: 10px;
        }

        .sidebar a.active {
            color: #0090ff;
            font-weight: 700;
        }

        .tab-container {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            margin-bottom: 1rem;
        }

        .tab-btn {
            flex: 1;
            text-align: center;
            padding: 12px;
            font-size: 18px;
            cursor: pointer;
            border-right: 1px solid #ccc;
            background-color: #dbd7d7ff;
            color: #555;
        }

        .tab-btn:last-child {
            border-right: none;
        }

        .tab-btn.active {
            color: #0090ff;
            font-weight: 700;
            border-bottom: 3px solid #0090ff;
            background-color: #fff;
        }

        .tab-content-section {
            display: none;
        }

        .tab-content-section.active {
            display: block;
        }

        .breadcrumb-item a {
            color: #0090ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        /* custom.css */

        /* Khai báo biến CSS để dễ dàng quản lý màu sắc - Đảm bảo rằng phần này có ở đầu tệp CSS của bạn */
        :root {
            --primary-color: #007bff;
            /* Màu xanh chính */
            --primary-hover-color: #0056b3;
            /* Màu xanh khi hover */
            --secondary-color: #6c757d;
            /* Màu xám phụ */
            --text-color: #343a40;
            /* Màu chữ chính */
            --light-background-color: #f0f2f5;
            /* Màu nền nhẹ nhàng cho body */
            --container-background-color: #ffffff;
            /* Màu nền trắng cho container */
            --border-color: #dee2e6;
            /* Màu viền */
            --danger-color: #dc3545;
            /* Màu đỏ */
            --danger-hover-color: #bd2130;
            /* Màu đỏ khi hover */
            --sidebar-bg-color: #ffffff;
            /* Nền sidebar trắng */
            --sidebar-border-color: #e9ecef;
            /* Viền sidebar nhạt */
            --tab-inactive-bg: #e9ecef;
            /* Nền tab không active */
            --tab-inactive-text: #6c757d;
            /* Màu chữ tab không active */
        }

        /* Kiểu dáng chung cho body và font */
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            background-color: var(--light-background-color);
            /* Nền trang màu xám nhẹ */
            color: var(--text-color);
            /* Màu chữ mặc định */
            line-height: 1.6;
        }

        /* Điều chỉnh container chính của trang */
        .container {
            max-width: 1200px;
            /* Chiều rộng tối đa cho container lớn */
            margin: 40px auto;
            /* Khoảng cách trên dưới */
        }

        /* Breadcrumb */
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-hover-color);
        }

        .breadcrumb-item.active {
            color: var(--secondary-color);
            /* Màu xám cho item active */
            font-weight: 600;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--sidebar-bg-color);
            /* Nền trắng cho sidebar */
            border: 1px solid var(--sidebar-border-color);
            /* Viền nhạt */
            padding: 20px;
            /* Tăng padding */
            border-radius: 12px;
            /* Bo tròn góc nhiều hơn */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            /* Đổ bóng nhẹ */
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 10px;
            /* Tăng padding item */
            color: var(--text-color);
            /* Màu chữ mặc định */
            text-decoration: none;
            font-size: 17px;
            /* Kích thước font */
            border-radius: 8px;
            /* Bo tròn item */
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động */
            margin-bottom: 5px;
            /* Khoảng cách giữa các item */
        }

        .sidebar a i {
            font-size: 20px;
            /* Kích thước icon */
            margin-right: 12px;
            /* Khoảng cách giữa icon và chữ */
            color: var(--secondary-color);
            /* Màu icon mặc định */
            transition: color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: var(--light-background-color);
            /* Nền nhẹ khi hover */
            color: var(--primary-color);
            /* Màu chữ xanh khi hover */
        }

        .sidebar a:hover i {
            color: var(--primary-color);
            /* Màu icon xanh khi hover */
        }

        .sidebar a.active {
            background-color: var(--primary-color);
            /* Nền xanh khi active */
            color: #ffffff;
            /* Chữ trắng khi active */
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
            /* Đổ bóng nhẹ cho active */
        }

        .sidebar a.active i {
            color: #ffffff;
            /* Icon trắng khi active */
        }


        /* Tab Container */
        .tab-container {
            background-color: var(--container-background-color);
            /* Nền trắng cho tab container */
            border: 1px solid var(--border-color);
            /* Viền nhạt */
            border-radius: 12px;
            /* Bo tròn góc */
            overflow: hidden;
            display: flex;
            margin-bottom: 25px;
            /* Khoảng cách dưới tab */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* Đổ bóng nhẹ */
        }

        .tab-btn {
            flex: 1;
            text-align: center;
            padding: 16px;
            /* Tăng padding */
            font-size: 18px;
            cursor: pointer;
            border-right: 1px solid var(--border-color);
            /* Viền phải cho các nút tab */
            background-color: var(--tab-inactive-bg);
            /* Nền xám nhạt cho tab không active */
            color: var(--tab-inactive-text);
            /* Màu chữ xám cho tab không active */
            font-weight: 500;
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động */
        }

        .tab-btn:last-child {
            border-right: none;
        }

        .tab-btn:hover:not(.active) {
            background-color: #f3f3f3;
            /* Nền nhạt hơn khi hover */
            color: var(--text-color);
        }

        .tab-btn.active {
            color: var(--primary-color);
            font-weight: 700;
            background-color: var(--container-background-color);
            /* Nền trắng cho tab active */
            border-bottom: 3px solid var(--primary-color);
            /* Thanh dưới màu xanh */
            box-shadow: inset 0 -3px 0 0 var(--primary-color);
            /* Đổ bóng dưới để tạo hiệu ứng thanh */
            border-radius: 12px 12px 0 0;
            /* Bo tròn góc trên */
        }

        /* Tab Content Section */
        .tab-content-section {
            background-color: var(--container-background-color);
            /* Nền trắng cho nội dung tab */
            padding: 30px;
            /* Tăng padding */
            border-radius: 12px;
            /* Bo tròn góc */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* Đổ bóng nhẹ */
            display: none;
            /* Mặc định ẩn */
        }

        .tab-content-section.active {
            display: block;
            /* Hiện khi active */
        }

        .tab-content-section p {
            font-size: 18px;
            color: var(--text-color);
            text-align: center;
            /* Căn giữa nội dung */
            margin: 20px 0;
            /* Khoảng cách trên dưới */
        }

        .tab-content-section a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .tab-content-section a:hover {
            color: var(--primary-hover-color);
            text-decoration: underline;
        }
    </style>
</head>



<body>
    @include('header')
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vé xe của tôi</li>
            </ol>
        </nav>
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-3">
                <div class="sidebar">
                    <a href="{{ route('info') }}"><i class="bi bi-person"></i> Thông tin tài khoản</a>
                    <a href="#" class="active"><i class="bi bi-receipt"></i> Đơn hàng của tôi</a>
                    <a href="#"><i class="bi bi-chat-dots"></i> Nhận xét chuyến đi</a>
                </div>

            </div>

            <!-- Main content -->
            <div class="col-md-9">
                <div class="tab-container">
                    <div class="tab-btn active" data-tab="current">Hiện tại</div>
                    <div class="tab-btn" data-tab="completed">Đã đi</div>
                    <div class="tab-btn" data-tab="cancelled">Đã huỷ</div>
                </div>

                <!-- Nội dung tab -->
                <div id="tab-current" class="tab-content-section active">
                    @if($currentBookings->isEmpty())
                    <p style="font-size: 18px;">Bạn chưa có chuyến sắp đi nào, <a href="{{ route('list') }}" class="text-primary fw-bold">Đặt chuyến đi ngay</a></p>
                    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Mã vé</th>
                    <th>Tuyến</th>
                    <th>Thời gian</th>
                    <th>Ghế</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($currentBookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->schedule->route->departure }} → {{ $booking->schedule->route->destination }}</td>
                    <td>{{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</td>
                    <td>
                        @foreach($booking->details as $detail)
                            {{ $detail->seat->seat_number }}
                        @endforeach
                    </td>
                    <td><span class="badge bg-warning text-dark">Chờ xác nhận</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
                </div>

                <div id="tab-completed" class="tab-content-section">
    @if($completedBookings->isEmpty())
        <p style="font-size: 18px;">Bạn chưa hoàn thành chuyến nào.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Mã vé</th>
                    <th>Tuyến</th>
                    <th>Thời gian</th>
                    <th>Ghế</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($completedBookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->schedule->route->departure }} → {{ $booking->schedule->route->destination }}</td>
                    <td>{{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</td>
                    <td>
                        @foreach($booking->details as $detail)
                            {{ $detail->seat->seat_number }}
                        @endforeach
                    </td>
                    <td><span class="badge bg-warning text-dark">Chờ xác nhận</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

                <div id="tab-cancelled" class="tab-content-section">
    @if($cancelledBookings->isEmpty())
        <p style="font-size: 18px;">Bạn chưa huỷ chuyến nào.</p>
    @else
    <table class="table">
            <thead>
                <tr>
                    <th>Mã vé</th>
                    <th>Tuyến</th>
                    <th>Thời gian</th>
                    <th>Ghế</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cancelledBookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->schedule->route->departure }} → {{ $booking->schedule->route->destination }}</td>
                    <td>{{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</td>
                    <td>
                        @foreach($booking->details as $detail)
                            {{ $detail->seat->seat_number }}
                        @endforeach
                    </td>
                    <td>
                        @php
                            $statusLabels = [
                                'pending' => 'Chờ xác nhận',
                                'confirmed' => 'Đã xác nhận',
                                'cancelled' => 'Đã hủy',
                                'completed' => 'Hoàn thành'
                            ];
                        @endphp
                        <span class="badge
                            @if($booking->status == 'pending') badge-success text-dark
                            @elseif($booking->status == 'cancelled') badge-danger text-dark
                            @elseif($booking->status == 'confirmed') badge-info text-dark
                            @else badge-warning text-dark @endif">
                            {{ $statusLabels[$booking->status] ?? $booking->status }}
                        </span>
                    </td>
                    <td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
            </div>
        </div>
    </div>
    @include('footer')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- JS xử lý tab -->
    <script>
        const tabs = document.querySelectorAll('.tab-btn');
        const sections = document.querySelectorAll('.tab-content-section');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Bỏ active khỏi các tab khác
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Ẩn tất cả section
                sections.forEach(section => section.classList.remove('active'));

                // Hiện section tương ứng
                const tabId = tab.getAttribute('data-tab');
                document.getElementById('tab-' + tabId).classList.add('active');
            });
        });
    </script>
</body>

</html>