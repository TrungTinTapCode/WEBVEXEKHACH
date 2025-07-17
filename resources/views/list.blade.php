<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả chuyến xe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        .card-custom {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .trip-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .sort-box {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 16px;
        }

        .trip-title {
            font-weight: bold;
        }

        .trip-note {
            color: #dc3545;
            font-weight: bold;
        }

        .trip-follow {
            color: #00c853;
            font-weight: 600;
        }

        .trip-detail-link {
            font-size: 0.9rem;
        }

        .payment-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .payment-method {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color: #4285f4;
            transform: translateY(-2px);
        }

        .payment-method img {
            width: 50px;
            height: 30px;
            object-fit: contain;
        }

        .app-download {
            text-align: center;
        }

        .app-download .qr-code {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #666;
        }

        .app-download .store-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .app-download .store-buttons img {
            width: 140px;
            height: 45px;
        }

        .social-section {
            text-align: center;
            margin: 40px 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            text-decoration: none;
        }

        .social-links .facebook {
            background-color: #1877f2;
        }

        .social-links .youtube {
            background-color: #ff0000;
        }

        .social-links .tiktok {
            background-color: #000;
        }
    </style>
</head>

<body>
    @include('header')
    <!-- tìm kiếm -->
    <div class="banner">
        <div class="search-form-overlay container">
            <ul class="nav nav-tabs nav-justified mb-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="xe-khach-tab" data-bs-toggle="tab" data-bs-target="#xe-khach" type="button" role="tab" aria-controls="xe-khach" aria-selected="true">
                        <i class="bi bi-bus-front-fill me-1"></i> COSMO BUS kính chào quý khách!
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="xe-khach" role="tabpanel" aria-labelledby="xe-khach-tab">
                    <form class="bg-white p-2 rounded-bottom shadow d-flex align-items-center flex-nowrap">
                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="departure" placeholder="Nơi xuất phát">
                        </div>

                        <div class="text-center me-2 d-none d-md-block">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>

                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" id="destination" placeholder="Nơi đến">
                        </div>

                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="text" class="form-control" data-datepicker data-placeholder="Chọn ngày đi">
                        </div>

                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="text" class="form-control" data-datepicker data-placeholder="Chọn ngày đến">
                        </div>

                        <button type="submit" class="btn btn-warning btn-sm flex-shrink-0 my-0">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- danh sách xe  -->
    <div class="container my-4">
        <div class="row">
            <!-- Filter Column -->
            <div class="col-md-3">
                <div class="sort-box">
                    <h5 class="mb-3">Sắp xếp</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortOption" id="defaultSort" checked>
                        <label class="form-check-label" for="defaultSort">Mặc định</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortOption" id="earlySort">
                        <label class="form-check-label" for="earlySort">Giờ đi sớm nhất</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sortOption" id="lateSort">
                        <label class="form-check-label" for="lateSort">Giờ đi muộn nhất</label>
                    </div>
                </div>
            </div>

            <!-- Results Column -->
            <div class="col-md-9">
                <h5>Kết quả: <strong>343 chuyến</strong></h5>

                <!-- Trip Item -->
                <div class="card-custom">
                    <div class="row g-2">
                        <div class="col-auto">
                            <img src="img/bus1.webp" class="trip-image" alt="Bus">
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <a href="#" class="text-primary text-decoration-none small">Lưu ý Đón/Trả tại TP.HCM</a>
                                    <div class="trip-title mt-1">Cẩm Nhung Luxury</div>
                                    <div class="text-muted small">Limousine 22 Phòng</div>
                                    <div class="d-flex align-items-center small mt-1">
                                        <i class="bi bi-clock me-1"></i> 23:30 - Văn phòng Phạm Ngũ Lão
                                        <span class="ms-3">Còn 12 chỗ trống</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-clock me-1"></i> 07:00 - Văn Phòng Nha Trang
                                        <a href="{{ route('detail') }}" class="ms-3 trip-detail-link">Thông tin chi tiết</a>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="trip-note">Từ 380.000đ</div>
                                </div>
                            </div>
                            <div class="trip-follow mt-2">Theo dõi hành trình xe</div>
                            <div class="fw-semibold text-end mt-1">Không cần thanh toán trước</div>
                        </div>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="row g-2">
                        <div class="col-auto">
                            <img src="img/bus1.webp" class="trip-image" alt="Bus">
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <a href="#" class="text-primary text-decoration-none small">Lưu ý Đón/Trả tại TP.HCM</a>
                                    <div class="trip-title mt-1">Cẩm Nhung Luxury</div>
                                    <div class="text-muted small">Limousine 22 Phòng</div>
                                    <div class="d-flex align-items-center small mt-1">
                                        <i class="bi bi-clock me-1"></i> 23:30 - Văn phòng Phạm Ngũ Lão
                                        <span class="ms-3">Còn 12 chỗ trống</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-clock me-1"></i> 07:00 - Văn Phòng Nha Trang
                                        <a href="{{ route('detail') }}" class="ms-3 trip-detail-link">Thông tin chi tiết</a>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="trip-note">Từ 380.000đ</div>
                                </div>
                            </div>
                            <div class="trip-follow mt-2">Theo dõi hành trình xe</div>
                            <div class="fw-semibold text-end mt-1">Không cần thanh toán trước</div>
                        </div>
                    </div>
                </div>

                <div class="card-custom">
                    <div class="row g-2">
                        <div class="col-auto">
                            <img src="img/bus1.webp" class="trip-image" alt="Bus">
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <a href="#" class="text-primary text-decoration-none small">Lưu ý Đón/Trả tại TP.HCM</a>
                                    <div class="trip-title mt-1">Cẩm Nhung Luxury</div>
                                    <div class="text-muted small">Limousine 22 Phòng</div>
                                    <div class="d-flex align-items-center small mt-1">
                                        <i class="bi bi-clock me-1"></i> 23:30 - Văn phòng Phạm Ngũ Lão
                                        <span class="ms-3">Còn 12 chỗ trống</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-clock me-1"></i> 07:00 - Văn Phòng Nha Trang
                                        <a href="{{ route('detail') }}" class="ms-3 trip-detail-link">Thông tin chi tiết</a>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <div class="trip-note">Từ 380.000đ</div>
                                </div>
                            </div>
                            <div class="trip-follow mt-2">Theo dõi hành trình xe</div>
                            <div class="fw-semibold text-end mt-1">Không cần thanh toán trước</div>
                        </div>
                    </div>
                </div>
                <!-- Duplicate the above .card-custom to add more results -->
            </div>
        </div>
    </div>

    <!-- Payment Methods and App Download -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Phương thức thanh toán</h6>
                    <div class="payment-methods">
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1a73e8/ffffff?text=VISA" alt="Visa">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/eb001b/ffffff?text=MC" alt="MasterCard">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/005aa0/ffffff?text=JCB" alt="JCB">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/d60270/ffffff?text=Momo" alt="Momo">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/0068ff/ffffff?text=ZaloPay" alt="ZaloPay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff4444/ffffff?text=Shopee" alt="ShopeePay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff6600/ffffff?text=SPay" alt="SPayLater">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1ba0e2/ffffff?text=VNPAY" alt="VNPAY">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff0000/ffffff?text=Viettel" alt="Viettel">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/00a651/ffffff?text=Napas" alt="Napas">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff6600/ffffff?text=OnePay" alt="OnePay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1976d2/ffffff?text=SmartPay" alt="SmartPay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Tải ứng dụng COSMO BUS</h6>
                    <div class="app-download">
                        <div class="qr-code">
                            📱 QR Code
                        </div>
                        <div class="store-buttons">
                            <img src="https://via.placeholder.com/140x45/000000/ffffff?text=App+Store" alt="App Store">
                            <img src="https://via.placeholder.com/140x45/000000/ffffff?text=Google+Play" alt="Google Play">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Social Links -->
    <div class="social-section">
        <h6 class="fw-bold">Kết nối với COSMO BUS</h6>
        <div class="social-links">
            <a href="#" class="social-icon facebook">f</a>
            <a href="#" class="social-icon youtube">▶</a>
            <a href="#" class="social-icon tiktok">♪</a>
        </div>
    </div>
    </div>
    @include('footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script xử lý input giả dạng date -->
    <script>
        document.querySelectorAll('input[data-datepicker]').forEach(function(input) {
            input.type = 'text';
            input.placeholder = input.getAttribute('data-placeholder') || 'Chọn ngày';
            input.addEventListener('focus', () => input.type = 'date');
            input.addEventListener('blur', () => {
                if (!input.value) input.type = 'text';
            });
        });
    </script>
</body>

</html>