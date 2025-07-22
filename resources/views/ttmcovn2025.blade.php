<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOBUS - MCOVN2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        .judge-card {
            position: relative;
            cursor: pointer;
        }

        .judge-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(54, 74, 161, 0.95);
            color: white;
            padding: 12px;
            opacity: 0;
            transition: opacity 0.4s ease;
            font-size: 14px;
        }

        .judge-card:hover .judge-overlay {
            opacity: 1;
        }
        .tintuc{
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .tuyensinh{
            margin-left: 210px;
            margin-right: 210px;
            text-align: justify;
            font-size: 18px;
            color: #666;
            line-height: 1.6;
        }
    </style>

</head>

<body>
    @include('header')
    <!-- Banner Ngay Dưới Header -->
    <div class="banner-top2">
        <img src="{{ asset('img/top2vn.jpg') }}" alt="Top 2 Miss Cosmo 2024" class="img-fluid w-100">
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Bên trái: Hình ảnh -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/uni.jpg') }}" alt="UNIMEDIA" class="img-fluid rounded">
            </div>

            <!-- Bên phải: Nội dung -->
            <div class="col-md-6">
                <h2 class="fw-bold">UNIMEDIA</h2>
                <p>
                    UniMedia là công ty hàng đầu tại Việt Nam trong lĩnh vực Giải trí truyền thông:
                    Tổ chức sự kiện, Truyền thông - Marketing 360O, Thiết kế – in ấn, Quản lý và Booking Hoa hậu, Nghệ sĩ.
                    <br><br>
                    Sản xuất chương trình các chương trình truyền hình thực tế như:
                    Hoa hậu Hoàn vũ Việt Nam, Hoa khôi Sông Vàm, Vietnam Why Not,...
                    tạo được tiếng vang và dấu ấn trong lòng công chúng.
                </p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Bên trái: Hình ảnh -->
            <div class="col-md-6">
                <h2 class="fw-bold">HOA HẬU HOÀN VŨ VIỆT NAM</h2>
                <p>
                    Hoa hậu Hoàn vũ Việt Nam – Miss Cosmo Vietnam là cuộc thi sắc đẹp uy tín hàng đầu tại Việt Nam.
                    Được tổ chức lần đầu tiên vào năm 2008, Hoa hậu Hoàn vũ Việt Nam đã trải qua 5 mùa giải với bề dày xuyên suốt 15 năm
                    nhằm tìm kiếm những người phụ nữ Việt Nam có vẻ đẹp hiện đại, có nội lực, bản lĩnh, nỗ lực hành động
                    và sẵn sàng đồng hành cùng sứ mệnh của tổ chức.
                    <br><br>
                    Đánh dấu chặng hành trình trong kỷ nguyên mới, Hoa hậu Hoàn vũ Việt Nam vẫn sẽ tiếp tục sứ mệnh dùng sức ảnh hưởng
                    của mình kiến tạo nên những giá trị tốt đẹp cho cộng đồng và xã hội.
                </p>
            </div>

            <!-- Bên phải: Nội dung -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/vn1.jpg') }}" alt="Hoa hậu Hoàn vũ Việt Nam" class="img-fluid rounded">
            </div>
        </div>
    </div>



    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Bên trái: Hình ảnh -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/UNICORP.jpg') }}" alt="UNICORP" class="img-fluid rounded ">
            </div>

            <!-- Bên phải: Nội dung -->
            <div class="col-md-6">
                <h2 class="fw-bold">UNICORP</h2> <br><br>
                <p>
                    UNICORP là đơn vị tổ chức cuộc thi Hoa hậu Hoàn vũ Việt Nam – một trong những cuộc thi sắc đẹp quy mô quốc gia hàng đầu Việt Nam.
                    <br><br> Trải qua 15 hình thành, UNICORP tự hào là đơn vị thành công trong việc tìm ra, đào tạo và đưa các Hoa, Á hậu
                    Hoàn vũ Việt Nam tham gia các cuộc thi nhan sắc quốc tế, đưa vẻ đẹp về văn hóa, con người Việt Nam lan tỏa đến bạn bè trên thế giới.
                </p>
            </div>
        </div>
    </div>




    <div class="container py-5" style="background-color: #eee;">
        <h2 class="text-center fw-bold mb-4">HỘI ĐỒNG BAN GIÁM KHẢO</h2>
        <div class="row justify-content-center">
            @php
            $judges = [
            [
            'image' => 'judges/VAN.jpg',
            'info' => 'TOP 21 MISS UNIVERSE 2020 - HOA HẬU HOÀN VŨ VIỆT NAM 2019 – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/HOA.jpg',
            'info' => 'NTK LÊ THANH HÒA – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/YEN.jpg',
            'info' => 'Á HẬU 1 HOA HẬU HOÀN VŨ VIỆT NAM 2008 - SIÊU MẪU VÕ HOÀNG YẾN – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/HEN.jpg',
            'info' => 'TOP 5 MISS UNIVERSE 2018 - HOA HẬU HOÀN VŨ VIỆT NAM 2017 - HHEN NIÊ – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/QHOA.jpg',
            'info' => 'THẠC SĨ - CA SĨ - MC QUỲNH HOA – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/international.png',
            'info' => 'GIÁM KHẢO QUỐC TẾ - TRƯỞNG BAN GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            [
            'image' => 'judges/VU.jpg',
            'info' => 'DOANH NHÂN NGUYỄN HOÀNG VŨ – THÀNH VIÊN HỘI ĐỒNG GIÁM KHẢO HOA HẬU HOÀN VŨ VIỆT NAM 2027'
            ],
            ];
            @endphp

            @foreach ($judges as $judge)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="judge-card position-relative overflow-hidden">
                    <img src="{{ asset('img/' . $judge['image']) }}" alt="Giám khảo" class="img-fluid rounded shadow">
                    @if($judge['info'])
                    <div class="judge-overlay d-flex align-items-center justify-content-center text-white text-center px-2">
                        <p class="m-0">{{ $judge['info'] }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="tintuc">
        <section style="background-color: #f3f3f3; padding: 60px 0;">
            <div style="text-align: center;">
                <h2 style="font-weight: bold; font-size: 36px;">AI SẼ LÀ TÂN HOA HẬU HOÀN VŨ VIỆT NAM 2027?</h2>
                <div style="width: 500px; height: 4px; background-color: #2e3b8b; margin: 10px auto;"></div> <br><br>
                <p class="tuyensinh" style="color: #666; font-size: 18px;">
                    Cánh cửa đầu tiên cho các cô gái từ 18-33 tuổi tham gia tranh tài, chinh phục danh hiệu cao quý Hoa Hậu Hoàn Vũ Việt Nam - Miss Cosmo Vietnam chính thức bắt đầu! Hãy sẵn sàng để trở thành đại diện Việt Nam tiếp theo tại thế vận hội sắc đẹp quốc tế Miss Cosmo, tiếp nối hành trình lan toả sức ảnh hưởng tích cực đến cộng đồng thông qua những nỗ lực và hành động cụ thể cùng Tổ chức Hoa hậu Hoàn Vũ Việt Nam.
<br>
                    <br>
                     <strong><i class="bi bi-fire"></i> VƯƠNG MIỆN HOA HẬU HOÀN VŨ VIỆT NAM 2027 SẼ GỌI TÊN AI?</strong> Bạn đã sẵn sàng trở thành đại diện tiếp theo, viết tiếp thành tích vẻ vang cho nhan sắc Việt tại đấu trường sắc đẹp hấp dẫn bậc nhất hành tinh - <strong>MISS COSMO !</strong>
                    <br><br>
                    Hãy đăng ký tham gia ngay hôm nay để có cơ hội trở thành người đại diện Việt Nam tại đấu trường sắc đẹp quốc tế!
                    <br>
                    <br>
                    Để biết thêm thông tin chi tiết về cuộc thi, vui lòng truy cập trang web
                    <a href="https://hoahauhoanvuvietnam.com" target="_blank" class="text-decoration-none text-primary">hoahauhoanvuvietnam.com</a>
                    hoặc theo dõi các kênh truyền thông chính thức của chúng tôi:
                    <br>
                    <a href="https://www.facebook.com/hoahauhoanvuvietnamofficial" target="_blank" class="text-decoration-none text-primary">Facebook</a> |
                    <a href="https://www.instagram.com/misscosmovietnam" target="_blank" class="text-decoration-none text-primary">Instagram</a> |
                    <a href="https://youtube.com/@uninetworkofficial?si=xRY-52uEezs3RGXk" target="_blank" class="text-decoration-none text-primary">YouTube</a>

                </p>
            </div>

            <div style="max-width: 1100px; margin: 40px auto; text-align: center;">
                <img src="img/cosmofamily.jpg" alt="Tin tức banner"
                    style="width: 100%; max-width: 10000px; height: auto; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">

            </div>
        </section>
    </div>

    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
