<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thanh toán - COSMO BUS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        .breadcrumb-item a {
            color: #0090ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .left-section,
        .right-section {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .bank-logo {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 8px 10px;
            text-align: center;
            cursor: pointer;
            background: #f8f9fa;
            transition: 0.3s;
            font-size: 13px;
            font-weight: 500;
        }

        .bank-logo:hover {
            border-color: #007bff;
            background: #e7f1ff;
        }

        .bank-logo.selected {
            border: 2px solid #007bff;
            background: #cce5ff;
        }

        .payment-button {
            background: #28a745;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
        }

        .card-custom {
            background: #fffefeff;
            padding: 20px;
            border-radius: 10px;
        }

        .clock-box {
            background: #dcd5d5ff;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            font-family: 'Orbitron', sans-serif;
            font-size: 42px;
            color: #0090ff;
        }

        .info-section {
            background: #dcd5d5ff;
            border-radius: 10px;
            padding: 15px 20px;
            margin-top: 15px;
        }

        .info-section h6 {
            border-bottom: 1px solid #666;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .info-label {
            font-weight: 500;
            color: #333;
        }

        .info-value {
            font-weight: 600;
        }

        .text-danger {
            color: red !important;
        }

        .text-success-note {
            color: green;
            font-size: 13px;
            font-style: italic;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            accent-color: #28a745 !important;
            border-radius: 4px;
        }

        .form-check-label {
            font-size: 16px;
            color: #333
        }
    </style>
</head>

<body>
    @include('header')

    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- LEFT -->
            <div class="col-lg-8">
                <div class="left-section">
                    <div class="alert alert-light border mb-4">
                        Quý khách vui lòng thanh toán trong thời gian hiển thị bên. Nếu quá thời gian, <span class="text-danger fw-bold">ghế sẽ bị huỷ</span> và bạn cần chọn lại.
                    </div>

                    <div class="mb-3">
                        <p class="mb-1">Số tiền cần thanh toán:</p>
                        <h4 class="text-primary fw-bold">230,000 VND</h4>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="onlinePayment" checked>
                        <label class="form-check-label fw-bold" for="onlinePayment">
                            Thanh toán online
                        </label>
                    </div>

                    <div class="fw-semibold mb-4">
                        Sau khi thanh toán, vui lòng đợi vài giây để hệ thống cập nhật trạng thái vé.
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary fw-bold">Thanh toán bằng thẻ nội địa</h5>
                        <div class="row g-2">
                            @foreach(['vietcombank', 'agribank', 'vietinbank', 'bidv', 'acb', 'techcombank'] as $bank)
                            <div class="col-4 col-md-2">
                                <div class="bank-logo" data-bank="{{ strtoupper($bank) }}">
                                    <img src="{{ asset('images/banks/' . $bank . '.png') }}" alt="{{ $bank }}" class="img-fluid">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="payment-button mt-3">Thanh toán online <i class="bi bi-arrow-right-circle-fill ms-2"></i></button>
                    </div>

                    <div>
                        <h5 class="text-primary fw-bold">Thanh toán bằng thẻ quốc tế</h5>
                        <div class="row g-2">
                            @foreach(['visa', 'mastercard', 'amex', 'discover', 'paypal'] as $intl)
                            <div class="col-4 col-md-2">
                                <div class="bank-logo" data-bank="{{ strtoupper($intl) }}">
                                    <img src="{{ asset('images/banks/' . $intl . '.png') }}" alt="{{ $intl }}" class="img-fluid">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="payment-button mt-3">Thanh toán online <i class="bi bi-arrow-right-circle-fill ms-2"></i></button>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">
                <div class="card-custom ">
                    <div class="clock-box" id="clock">
                        9:30
                    </div>

                    <div class="info-section">
                        <h6>Thông tin</h6>
                        <p><span class="info-label">Họ tên:</span> <span class="info-value">Lê Hoàng Huy</span></p>
                        <p><span class="info-label">Số điện thoại:</span> <span class="info-value">0999053049</span></p>
                        <p><span class="info-label">Điểm lên xe:</span> <span class="info-value">256 Đ. Nguyễn Văn Cừ, Cần Thơ</span></p>
                        <p><span class="info-label">Loại ghế:</span> <span class="info-value text-danger">Giường nằm</span></p>
                        <p><span class="info-label">Chuyến:</span> <span class="info-value text-danger">Cần Thơ - Campuchia</span></p>
                        <p><span class="info-label">Khởi hành:</span> <span class="info-value">11:00 06/07/2025</span></p>
                        <p><span class="info-label">Số Ghế:</span> <span class="info-value">49A</span></p>
                        <p><span class="info-label">Chi phí:</span> <span class="info-value">230,000 VND</span></p>
                        <p class="text-success-note">(*) Chi phí đã bao gồm thuế VAT, bảo hiểm hành khách, dịch vụ wifi, nước và khăn lạnh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

    <script>
        let timeLeft = 9 * 60 + 30;

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('clock').textContent =
                `${minutes}:${seconds.toString().padStart(2, '0')}`;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert('Hết thời gian thanh toán! Ghế đã bị huỷ.');
            }
            timeLeft--;
        }

        const timerInterval = setInterval(updateTimer, 1000);
        let selectedBank = null;
        document.querySelectorAll('.bank-logo').forEach(el => {
            el.addEventListener('click', function() {
                document.querySelectorAll('.bank-logo').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                selectedBank = this.getAttribute('data-bank');
            });
        });

        document.querySelectorAll('.payment-button').forEach(btn => {
            btn.addEventListener('click', () => {
                if (!document.getElementById('onlinePayment').checked) {
                    alert('Chỉ hỗ trợ thanh toán online!');
                    return;
                }
                if (!selectedBank) {
                    alert('Vui lòng chọn ngân hàng trước khi thanh toán!');
                    return;
                }
                alert(`Đang chuyển hướng đến cổng thanh toán ${selectedBank}...`);
            });
        });

        document.getElementById('onlinePayment').addEventListener('change', function() {
            if (!this.checked) {
                alert('Chỉ hỗ trợ thanh toán online!');
                this.checked = true;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>