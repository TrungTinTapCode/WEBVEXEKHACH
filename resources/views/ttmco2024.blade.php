<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOBUS - MCO2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        .banner-top2 img {
            max-height: 900px;
            /* Bạn có thể chỉnh lại */
            object-fit: cover;
            width: 100%;
            display: block;

        }

        .col-lg-6 {
            margin-top: 40px;
        }

        .miss-cosmo-image {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Căn giữa theo chiều dọc nếu cần */
        }

        /* Căn chỉnh chung */
        .miss-cosmo-content {
            padding: 2rem;
        }

        /* Responsive căn giữa */
        @media (max-width: 992px) {
            .miss-cosmo-content {
                text-align: center !important;
            }
        }

        /* Màu sắc */
        .text-dark-blue {
            color: #0e3a77;
            /* Màu xanh đậm cho tiêu đề */
        }

        .text-primary-blue {
            color: #0e3a77;
            /* Màu xanh dương cho "MISS COSMO 2024" */
        }

        .miss-cosmo-container {
            font-family: 'Arial', sans-serif;
            background: white;
        }

        .cosmo-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .impactful-beauty h2,
        .impactful-beauty h3 {
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .cosmo-banner img {
            border-top: 3px solid #0e3a77;
        }

        @media (max-width: 768px) {
            h1.display-4 {
                font-size: 2.5rem;
            }

            .cosmo-content p {
                font-size: 1rem;
            }

            .impactful-beauty h2 {
                font-size: 1.8rem;
            }

            .impactful-beauty h3 {
                font-size: 1.5rem;
            }
        }


        /* .banner-top2{
            margin-bottom: 10px;
        } */
    </style>
</head>

<body>
    @include('header')
    <!-- Banner Ngay Dưới Header -->
    <div class="banner-top2">
        <img src="{{ asset('img/top2.jpg') }}" alt="Top 2 Miss Cosmo 2024" class="img-fluid w-100">
    </div>



    <div class="miss-cosmo-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Cột trái - Nội dung (đã chỉnh căn giữa và màu) -->
                <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start"> <!-- Thêm text-center text-lg-start -->
                    <div class="miss-cosmo-content">
                        <!-- Cả 3 dòng cùng sử dụng thẻ h4 và class giống nhau -->
                        <h4 class="display-6 fw-bold mb-3" style="color: #0e3a77;">HOA HẬU ĐẦU TIÊN</h4>
                        <h4 class="display-6 fw-bold mb-3" style="color: #0e3a77;">CỦA KỶ NGUYÊN NHAN SẮC</h4>
                        <h4 class="display-3 fw-bold mb-4" style="color: #0e3a77;">MISS COSMO 2024</h4>

                        <div class="d-flex justify-content-center justify-content-lg-start"> <!-- Căn giữa nút trên mobile, trái trên desktop -->
                            <a href="https://www.facebook.com/MissCosmo.TataJuliastrid" class="btn btn-outline-primary btn-lg mb-5">Đọc thêm</a>
                        </div>
                    </div>
                </div>

                <!-- Cột phải - Hình ảnh (đã căn giữa) -->
                <div class="col-lg-6">
                    <div class="miss-cosmo-image text-center">
                        <img src="img/avttata.png" alt="Miss Cosmo 2024"
                            class="img-fluid rounded shadow mx-auto d-block"
                            style="max-height: 400px; width: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>



   <div class="miss-cosmo-container py-4" style="background-color: #0e3a77;">
    <!-- Phần chữ nội dung -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-center" style="color:rgb(255, 255, 255);">VỀ MISS COSMO</h1>

                <div class="cosmo-content mb-4">
                    <p class="lead text-white text-left mb-3">
                        Miss Cosmo (Hoa hậu Hoàn vũ Quốc tế) là THẾ VẬN HỘI SẮC ĐẸP QUỐC TẾ do Unimedia sáng lập, tổ chức tại Việt Nam lần đầu tiên vào năm 2024.
                    </p>
                    <p class="lead text-white text-left mb-3">
                        Mang khẩu hiệu "IMPACTFUL BEAUTY - VẺ ĐẸP NÂNG TẦM ẢNH HƯỞNG", Miss Cosmo hướng tới mục tiêu hiện thực hoá những hoài bão của phụ nữ toàn cầu, chúng tôi quan tâm đến những kế hoạch mà bạn đã ấp ủ với mục tiêu thay đổi thế giới tốt đẹp và hướng đến tinh thần dám nói dám làm của bất kỳ ai.
                    </p>
                </div>

                <div class="divider my-3 mx-auto" style="width: 100px; border-top: 2px solid white;"></div>
            </div>
        </div>
    </div>

    <!-- Phần banner hình ở dưới -->
    <div class="cosmo-banner mt-3">
        <img src="{{ asset('img/tata2.jpg') }}"
             alt="Miss Cosmo Banner"
             class="img-fluid w-100"
             style="max-height: 800px; object-fit: cover;">
    </div>
</div>

<div class="video">
    <h1 style="font-size: 60px;"><strong>AI SẼ LÀ MISS COSMO 2025?</strong></h1>
    <p style="font-size: 15px; max-width: 800px; margin: auto; text-align: left;">
        Miss Cosmo 2025 được tổ chức từ tháng 10/2025 đến tháng 12/2025 tại Việt Nam với sự tham gia hơn 60 quốc gia và vùng lãnh thổ trên thế giới. Cuộc thi được tổ chức chuyên nghiệp theo tiêu chuẩn quốc tế với lịch trình cùng hoạt động vô cùng hấp dẫn, sôi động diễn ra tại Thủ đô Hà Nội, TP. HCM, Ninh Bình, Long An, Đà Lạt,…
<br><br>
Những đại diện ưu tú từ các quốc gia sẽ hội ngộ tại Việt Nam vào tháng 10/2025, tham gia nhiều phần thi và hoạt động ý nghĩa. Đêm Bán kết- Chung kết sẽ diễn ra với quy mô hoành tráng, tạo nên chuỗi sự kiện bùng nổ tại TP. HCM. Hội đồng Ban giám khảo bao gồm các hoa hậu và chuyên gia quốc tế sẽ cùng nhau tìm ra chủ nhân vương miện danh giá Miss Cosmo – Hoa hậu Hoàn vũ Quốc tế 2025.    </p>

    <div id="video-container">
        <iframe
            id="yt-video"
            src="https://www.youtube.com/embed/AvxN04Dug-8?enablejsapi=1&autoplay=0&mute=1"
            allow="autoplay; encrypted-media"
            allowfullscreen>
        </iframe>
    </div>

</div>

    @include('footer')
<script>
        // Tải YouTube Iframe API
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        let player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('yt-video', {
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        player.playVideo();
                    } else {
                        player.pauseVideo();
                    }
                });
            });

            observer.observe(document.getElementById('video-container'));
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                player.seekTo(0);
                player.playVideo();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
