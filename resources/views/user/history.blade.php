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
    </style>
</head>

@include('header')

<body>
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-3">
            <div class="sidebar">
                <a href="#"><i class="bi bi-person"></i> Thông tin tài khoản</a>
                <a href="#"><i class="bi bi-patch-check"></i> Thành viên <strong>Thường</strong></a>
                <a href="#" class="active"><i class="bi bi-receipt"></i> Đơn hàng của tôi</a>
                <a href="#"><i class="bi bi-credit-card"></i> Quản lí thẻ</a>
                <a href="#"><i class="bi bi-chat-dots"></i> Nhận xét chuyến đi</a>
                <a href="#"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
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
                <p style="font-size: 18px;">Bạn chưa có chuyến sắp đi nào, <a href="#" class="text-primary fw-bold">Đặt chuyến đi ngay</a></p>
            </div>

            <div id="tab-completed" class="tab-content-section">
                <p style="font-size: 18px;">Bạn chưa hoàn thành chuyến nào.</p>
            </div>

            <div id="tab-cancelled" class="tab-content-section">
                <p style="font-size: 18px;">Bạn chưa huỷ chuyến nào.</p>
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
