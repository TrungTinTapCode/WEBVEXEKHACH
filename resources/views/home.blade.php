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
<div class="marquee-container py-2">
    <div class="marquee-content">
        <span class="marquee-text">
            <i class="bi bi-bus-front-fill me-2"></i> COSMO BUS kính chào quý khách! Chúc quý khách một ngày tốt lành!
        </span>
    </div>
</div>

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
        <div class="col-md-6 ">
        <h2 class="mb-3 fw-bold">COSMO BUS - Đồng hành cùng kỷ nguyên vươn mình phát triển đất nước</h2>
        <p class="text-muted ">
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


<div class="tintuc">
    <section class="news-section">
    <h2 class="section-title">Tin tức</h2>
    <div class="news-container">
        <div class="news-item">
            <img src="img/chuy.jpg" alt="News Image 1">
            <div class="news-content">
                <h3>Một số thủ đoạn giả danh COSMO BUS, cẩn trọng lưu ý khi chia sẻ thông tin cá nhân</h3>
                <!-- <p>Mô tả ngắn về tin tức số 1.</p> -->
            </div>
        </div>
        <div class="news-item">
            <img src="img/cachmang.jpg" alt="News Image 2">
            <div class="news-content">
                <h3>[Phóng sự HTV9] COSMO BUS và công cuộc cách mạng hóa ngành vận tải hành khách</h3>
                <!-- <p>Mô tả ngắn về tin tức số 2.</p> -->
            </div>
        </div>
        <div class="news-item">
            <img src="img/congnhan.jpg" alt="News Image 3">
            <div class="news-content">
                <h3>Bộ Thông tin - Truyền thông công nhận COSMOBUS là Nền tảng phục vụ người dân 2025</h3>
                <!-- <p>Mô tả ngắn về tin tức số 3.</p> -->
            </div>
        </div>
        <div class="news-item">
            <img src="img/phongsu.jpg" alt="News Image 4">
            <div class="news-content">
                <h3>[Phóng sự VTV9] Đặt dịch vụ xe khách nhanh chóng, tiện lợi, nhiều ưu đãi tại COSMO BUS</h3>
                <!-- <p>Mô tả ngắn về tin tức số 4. Đây là một tin tức bổ sung để có đủ 4 ảnh.</p> -->
            </div>
        </div>
    </div>
</section>
</div>



<div class="cosmobus">
    <section class="new-features-section">
    <h2 class="new-features-title">COSMO BUS có gì mới?</h2>
    <div class="new-features-container scrollable">
        <div class="feature-item">
            <img src="img/nhanhchong.png" alt="Vexere Affiliate">
            <div class="feature-content">
                <h3>Đặt vé xe nhanh chóng - tiện lợi cùng với COSMO BUS</h3>
            </div>
        </div>
        <div class="feature-item">
            <img src="img/baohiem.png" alt="Đặt vé tàu hỏa">
            <div class="feature-content">
                <h3>Bồi thường đến 1.000.000 VNĐ với bảo hiểm trễ, huỷ chuyến xe tại COSMO BUS </h3>
            </div>
        </div>
        <div class="feature-item">
            <img src="img/uudai.png" alt="Bảo hiểm chuyến đi">
            <div class="feature-content">
                <h3>Nhận ngay 1 vé xem chung kết HOA HẬU HOÀN VŨ VIỆT NAM 2025 - Khi đã đặt 10 vé xe tại COSMO BUS</h3>
            </div>
        </div>
        <div class="feature-item">
            <img src="img/chuyendi.png" alt="Tính năng mới 4">
            <div class="feature-content">
                <h3>"Bảo hiểm chuyến đi" - Chính thức ra mắt tại COSMO BUS</h3>
            </div>
        </div>
        <!-- <div class="feature-item">
            <img src="https://via.placeholder.com/300x150?text=Feature+5" alt="Tính năng mới 5">
            <div class="feature-content">
                <h3>Tiêu đề tính năng mới số 5</h3>
            </div>
        </div> -->
        </div>
</section>
</div>


<div class="KH">
    <section class="customer-testimonials py-5 bg-light">
    <div class="container">
        <h2 class="text-left mb-5 fw-bold">Khách hàng nói gì về COSMO BUS</h2>

        <!-- Testimonial 1 -->
        <div class="testimonial-card mb-5 p-4 p-md-5 bg-white rounded-3 shadow-sm position-relative">
            <div class="quote-icon position-absolute top-0 start-0 mt-4 ms-4">
                <i class="bi bi-quote fs-1 text-primary opacity-10"></i>
            </div>
            <div class="row align-items-center">
                <!-- Hình ảnh khách hàng -->
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <img src="img/TVBH.jpg" alt="Trần Việt Bảo Hoàng" class="rounded-circle img-fluid border border-3 border-primary" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <div class="col-md-9">
                    <div class="testimonial-content mb-4">
                        <p class="fs-5 fst-italic text-dark">"Lần trước tôi có việc gặp phải đi công tác, lên mạng tìm đặt vé xe thì tính cờ tìm thấy COSMO BUS. Sau khi tham khảo, tôi quyết định đặt vé và thanh toán. Công nhận rất tiện và nhanh chóng..."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="border-top pt-3">
                            <h5 class="mb-1 fw-bold">Trần Việt Bảo Hoàng</h5>
                            <p class="text-muted mb-0"><i class="bi bi-building me-1"></i> CEO UNIMEDIA</p>
                            <div class="rating mt-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="testimonial-card p-4 p-md-5 bg-white rounded-3 shadow-sm position-relative">
            <div class="quote-icon position-absolute top-0 start-0 mt-4 ms-4">
                <i class="bi bi-quote fs-1 text-primary opacity-10"></i>
            </div>
            <div class="row align-items-center">
                <!-- Hình ảnh khách hàng -->
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <img src="img/TATA.jpg" alt="Tata Juliastrid" class="rounded-circle img-fluid border border-3 border-primary" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <div class="col-md-9">
                    <div class="testimonial-content mb-4">
                        <p class="fs-5 fst-italic text-dark">"Các đối tác của COSMO BUS đều là những hãng xe lớn, có uy tín nên tôi hoàn toàn yên tâm khi lựa chọn đặt vé cho các chuyến công tác tại Việt Nam..."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="border-top pt-3">
                            <h5 class="mb-1 fw-bold">Tata Juliastrid</h5>
                            <p class="text-muted mb-0"><i class="bi bi-building me-1"></i>MISS COSMO 2024</p>
                            <div class="rating mt-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>



<div class="mpc-section-wrapper">
    <div class="mpc-text-content">
        <h1><b>SHOOT FOR THE MOON - SĂN TRĂNG</b></h1>
        <p class="moon">Lấy cảm hứng từ khát vọng vươn xa, COSMO BUS mang đến chủ đề <strong>"SHOOT FOR THE MOON - SĂN TRĂNG"</strong> với thông điệp: “Mỗi nỗ lực đều mở ra một chân trời mới. Quan trọng không phải bạn chạm tay đến đâu, mà là dám ước mơ, dám hành động và trở thành phiên bản rực rỡ nhất của chính mình”.
 <br><br> "SHOOT FOR THE MOON" không chỉ là triết lý sống mà còn là kim chỉ nam cho những ai dám theo đuổi đam mê đến cùng. Và đây còn là mở ra cánh cửa để họ viết tiếp câu chuyện của riêng mình.
Với chủ đề năm nay, Chúng tôi mong muốn truyền cảm hứng để các bạn trẻ dám bước ra khỏi giới hạn an toàn, sẵn sàng đối mặt với thử thách và hành trình khẳng định chính mình. <br><br> Từng chuyến xe của COSMO BUS chúng tôi hi vọng rằng sẽ tiếp thêm sức mạnh, đồng hành cùng bạn trên quãng đường nho nhỏ, gieo một chút hi vọng và niềm tin mãnh liệt đến các bạn. Đồng hành trong chặn hành trình tìm đến cánh cửa ước mơ và tương lai bay xa, nhất là các bạn trẻ dám bức phá bản thân để khẳng định chính mình! </p>
        <p class="moon2" text align="right">Hãy cùng COSMO BUS "SĂN TRĂNG" và chạm đến những ước mơ lớn lao nhất của bạn!</p>
    </div>
    <div class="mpc-banner-image">
        <img src="img/moon.jpg" alt="Moon Banner">
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
