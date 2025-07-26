<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả chuyến xe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
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

        .banner .container {
            margin-top: 40px;
            margin-bottom: 60px;
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
                <h5>Kết quả: <strong>{{ $schedules->filter(fn($s) => $s->route->is_active)->count() }} chuyến</strong></h5>


                <!-- Trip Item -->
                @foreach($schedules as $schedule)
                @if($schedule->is_active)
    <div class="card-custom">
        <div class="row g-2">
            <div class="col-auto">
                <img src="{{ asset('storage/' . $schedule->route->image) }}" class="trip-image" alt="Bus">
            </div>
            <div class="col">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="trip-title mt-1">
                            {{ $schedule->route->title }}
                        </div>
                        <div class="trip-title mt-1">{{ $schedule->bus->bus_name }}</div>
                        <div class="text-muted small">{{ $schedule->bus->bus_type }}</div>
                        <div class="d-flex align-items-center small mt-1">
                            <i class="bi bi-clock me-1"></i> {{ $schedule->departure_time }} - {{ $schedule->route->departure }}
                            <span class="ms-3">Còn {{ $schedule->available_seats ?? '...' }} chỗ trống</span>
                        </div> <br>
                        <div class="d-flex align-items-center small">
                            <i class="bi bi-clock me-1"></i> {{ $schedule->arrival_time }} - {{ $schedule->route->destination }}
                            <a href="{{ route('detail', ['id' => $schedule->schedule_id]) }}" class="ms-3 trip-detail-link">Thông tin chi tiết</a>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="trip-note">Từ {{ number_format($schedule->route->price) }}đ</div>
                    </div>
                </div>
                <div class="fw-semibold text-end mt-1">Không cần thanh toán trước</div>
            </div>
        </div>
    </div>
    @endif
@endforeach
                <!-- Duplicate the above .card-custom to add more results -->
            </div>
        </div>
    </div>

    <!-- Payment Methods and App Download -->
    <div class="container">
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
                            <!-- QR Code -->
                            <div class="col-12 col-md-5 text-center text-md-start mb-3 mb-md-0">
                                <div class="qr-code">
                                    <img src="{{ asset('img/Bank-logo/Cosmo-QR.jpg') }}" alt="QR Code" class="qr-img">
                                </div>
                            </div>

                            <!-- Store Buttons -->
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
                            </a>
                            <a href="#" class="social-icon tiktok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


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