<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOBUS - HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    @include('header')

    <div class="main-banner-section">
        <img src="{{ asset('img/co8.jpg') }}" class="banner-img" alt="Banner quảng cáo">

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

<br><br>



    <div class="container my-4">
    <div class="row align-items-center">

        <!-- Cột trái: Hình ảnh -->
        <div class="col-md-6 mb-3 mb-md-0">
        <img src="img/bus1.webp" class="img-fluid rounded shadow" alt="Ảnh mô tả">
        </div>

        <!-- Cột phải: Văn bản -->
        <div class="col-md-6">
        <h2 class="mb-3">COSMO BUS - Đồng hành cùng kỷ nguyên vươn mình phát triển đất nước</h2>
        <p class="text-muted">
            COSMO BUS được thành lập với sứ mệnh tiên phong trong việc kết nối các vùng miền, góp phần xây dựng hệ thống giao thông hiện đại cho đất nước đang vươn mình phát triển. Với tầm nhìn xa rộng và khát vọng đóng góp vào sự thịnh vượng chung, chúng tôi mang đến trải nghiệm di chuyển an toàn, tiện lợi và thoải mái nhất cho mọi hành khách. Đội ngũ lái xe chuyên nghiệp cùng hệ thống xe hiện đại của COSMO BUS không chỉ đáp ứng nhu cầu vận chuyển đa dạng mà còn thể hiện tinh thần đổi mới sáng tạo - động lực quan trọng thúc đẩy đất nước vươn lên trong kỷ nguyên mới. Chúng tôi cam kết cung cấp dịch vụ vận tải chất lượng cao, góp phần kết nối kinh tế, văn hóa và xã hội giữa các địa phương. Không ngừng cải tiến và đổi mới công nghệ, COSMO BUS tự hào là cầu nối tin cậy cho những chuyến đi đáng nhớ - từ các chuyến công tác ngắn ngày đến những hành trình khám phá dài hơn. Mỗi chuyến xe của chúng tôi đều mang trong mình khát vọng phát triển và tinh thần vượt khó vươn lên của dân tộc.
            <br> <b>COSMO BUS - Nơi hành trình bắt đầu với sự an tâm và hài lòng, cùng đất nước vươn mình trong kỷ nguyên phát triển mới.</b>
        </p>
        <!-- <ul>
            <li>Thông tin 1</li>
            <li>Thông tin 2</li>
            <li>Thông tin 3</li>
        </ul> -->
        <!-- <a href="#" class="btn btn-primary mt-2">Xem thêm</a> -->
        </div>

    </div>
    </div>





    <div class="container my-4">
    <h4 class="mb-4">Tuyến đường phổ biến</h4>
    <div class="row">
        @foreach ($routes as $route)
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="position-relative">
                <img src="{{ asset($route['image']) }}" class="card-img-top" style="height: 160px; object-fit: cover;">
                <div style="background-color: {{ $route['bg_color'] }};" class="p-2 text-white fw-bold">
                    {{ $route['title'] }}<br>
                    <small>
                        Từ {{ number_format($route['price'], 0, ',', '.') }}đ
                        @if ($route['old_price'])
                            <span style="text-decoration: line-through; color: #eee; font-size: 0.85em;">
                                {{ number_format($route['old_price'], 0, ',', '.') }}đ
                            </span>
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
