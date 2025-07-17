<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin hành khách</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            font-family: system-ui, sans-serif;
        }
        label {
            font-weight: 600;
        }
        .section-title {
            color: #0090ff;
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
        }
        .required {
            color: red;
        }
        .note {
            font-size: 14px;
            color: #777;
        }
        select,
        input[type="text"],
        input[type="email"] {
            height: 40px;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="container py-4">
        <h5 class="section-title">THÔNG TIN HÀNH KHÁCH</h5>
        <div class="row g-3">
            <div class="col-md-3">
                <label>Hành khách</label>
                <div class="form-control border-0 text-secondary">Người Lớn</div>
            </div>
            <div class="col-md-3">
                <label>Quý Danh <span class="required">*</span></label>
                <select class="form-select">
                    <option selected>Ông</option>
                    <option>Bà</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Họ Và Tên <span class="required">*</span> <span class="note">(Ví Dụ: Nguyễn Văn A)</span></label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
            </div>
        </div>

        <h5 class="section-title mt-4">THÔNG TIN NGƯỜI LIÊN HỆ</h5>
        <p class="note mb-2">
            Vui lòng điền đầy đủ thông tin, nhân viên sẽ liên lạc với khách hàng qua địa chỉ này để hoàn thành thủ tục đặt vé.
            <br><span class="required">*</span> Các trường bắt buộc phải nhập.
        </p>
        <div class="row g-3">
            <div class="col-md-6">
                <label>Mã Khách Hàng</label>
                <input type="text" class="form-control">
                <small class="note">(Hoặc số điện thoại khách hàng đã đăng ký)</small>
            </div>
            <div class="col-md-6">
                <label>Địa Chỉ Liên Hệ</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Quý Danh</label>
                <select class="form-select">
                    <option selected>Ông</option>
                    <option>Bà</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Họ Và Tên <span class="required">*</span></label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                <small class="note">(Để chúng tôi liên lạc với quý khách)</small>
            </div>
            <div class="col-md-3">
                <label>Số Điện Thoại <span class="required">*</span></label>
                <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}">
            </div>
            <div class="col-md-3">
                <label>Số Điện Thoại Khác</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                <small class="note">(Để gửi thông tin vé, hành trình, thanh toán)</small>
            </div>
            <div class="col-md-6">
                <label>Tỉnh/Thành Phố</label>
                <select name="province" class="form-select">
                    <option selected>Cần Thơ</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Ngày</label>
                <select class="form-select">
                    @for ($i = 1; $i <= 31; $i++)
                        <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Tháng</label>
                <select class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Năm Sinh</label>
                <select class="form-select">
                    @for ($i = date('Y'); $i >= 1900; $i--)
                        <option>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Quốc Gia</label>
                <select class="form-select">
                    <option selected>Việt Nam</option>
                    <option>Hoa Kỳ</option>
                    <option>Nhật Bản</option>
                    <option>Khác</option>
                </select>
            </div>
        </div>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary px-4">Cập nhật</button>

            {{-- Nút đăng xuất --}}
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger px-4 ms-2">Đăng xuất</button>
            </form>
        </div>
    </div>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
