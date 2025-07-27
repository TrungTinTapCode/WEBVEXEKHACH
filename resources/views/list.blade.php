<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả chuyến xe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
.card {
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            padding: 20px;
        }

        .card-custom {
            border: 1px solid rgb(255, 255, 255);
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
.social-icon.facebook {
    background-color: #1877f2; /* Facebook blue */
    color: #fff;
}

.social-icon.youtube {
    background-color: #ff0000; /* YouTube red */
    color: #fff;
}

.social-icon.tiktok {
    background-color: #000000; /* TikTok black */
    color: #fff;
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
    text-decoration: none;
    font-size: 18px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.social-icon:hover {
    transform: scale(1.1);
    opacity: 0.9;
}


        .banner .container {
            margin-top: 40px;
            margin-bottom: 60px;
        }
        body {
     background: url('{{ asset('img/bgr.jpg') }}') center/cover no-repeat;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
.sort-box {
    background-color: #ffffff; /* nền trắng */
    color: #000000; /* chữ đen */
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05); /* đổ bóng nhẹ */
}
.sort-box .form-check-label {
    color: #000000;
}

form.bg-white {
    background-color: #ffffff; /* nền trắng */
    color: #000000; /* chữ đen */
}

form.bg-white .form-control {
    background-color: #ffffff;
    color: #000000;
    border: 1px solid #ced4da;
}

form.bg-white .form-control::placeholder {
    color: #6c757d; /* placeholder xám nhạt */
}

form.bg-white .input-group-text {
    background-color: #f8f9fa;
    color: #000000;
    border: 1px solid #ced4da;
}

form.bg-white .btn-warning {
    color: #000000;
    font-weight: bold;
}
.card-custom {
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .trip-title {
        font-weight: bold;
        font-size: 16px;
        color: #000;
    }

    .trip-detail-link {
        color: #007bff;
        text-decoration: none;
    }

    .trip-detail-link:hover {
        text-decoration: underline;
    }

    .trip-note {
        font-weight: bold;
        color: #d9534f;
    }

    /* Ảnh trong thẻ kết quả */
    .trip-image {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Thanh toán & app */
    .payment-section {
        background-color: #ffffff;
        color: #000000;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .payment-method img,
    .qr-img,
    .store-img {
        max-width: 100%;
        height: auto;
    }

    .social-icon {
        font-size: 20px;
        margin-right: 10px;
        color: #000;
        text-decoration: none;
    }

    .social-icon:hover {
        color:rgb(255, 255, 255);
    }

    </style>
</head>

<body>
    @include('header')
<div class="listt">

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
                    <form action="{{ route('list') }}" method="GET" class="bg-white p-2 rounded-bottom shadow d-flex align-items-center flex-nowrap">
                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" name="departure" placeholder="Nơi xuất phát">
                        </div>

                        <div class="text-center me-2 d-none d-md-block">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>

                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <input type="text" class="form-control" name="destination" placeholder="Nơi đến">
                        </div>

                        <div class="input-group input-group-sm flex-grow-1 me-2 my-0">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="text" class="form-control" name="date" placeholder="Chọn ngày đi">
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
                <div class="sort-box ">
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
                <h3 class="text-white">Kết quả: <strong>{{ $schedules->filter(fn($s) => $s->is_active)->count() }} chuyến</strong></h3>


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


                            <!-- <span class="ms-3">Còn {{ $schedule->available_seats ?? '...' }} chỗ trống</span> -->

                        </div>
                        <div class="d-flex align-items-center small">
                            <i class="bi bi-clock me-1"></i> {{ $schedule->arrival_time }} - {{ $schedule->route->destination }}
                            <a href="{{ route('detail', ['id' => $schedule->schedule_id]) }}" class="ms-3 trip-detail-link">Thông tin chi tiết</a>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="trip-note">Từ {{ number_format($schedule->route->price) }}đ</div>
                    </div>
                </div>

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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[name='date']", {
        dateFormat: "Y-m-d", // Laravel expects this format for whereDate
    });
</script>
</body>

</html>
