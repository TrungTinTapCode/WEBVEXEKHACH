<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin hành khách</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Custom CSS -->
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
        <p class="note mb-2">
            Vui lòng điền đầy đủ thông tin, nhân viên sẽ liên lạc với khách hàng qua địa chỉ này để hoàn thành thủ tục đặt vé.
            <br><span class="required">*</span> Các trường bắt buộc phải nhập.
        </p>
        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label>Họ Và Tên <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="col-md-3">
                    <label>Giới tính</label>
                    <select class="form-select" name="gender">
                        <option value="Nam" {{ old('gender', Auth::user()->gender ?? '') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gender', Auth::user()->gender ?? '') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Mã Khách Hàng</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->phone_number }}" disabled>
                </div>

                <div class="col-md-6">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>

                <div class="col-md-3">
                    <label>Số Điện Thoại</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                </div>

                <div class="col-md-3">
                    <label>Ngày sinh</label>
                    <div class="input-group">
                        <input id="ngay_sinh" name="ngay_sinh" type="text" class="form-control" value="{{ Auth::user()->ngay_sinh }}">
                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label>Địa Chỉ Liên Hệ</label>
                    <input type="text" name="dia_chi" class="form-control" value="{{ Auth::user()->dia_chi }}">
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
        </form>

    </div>

    @include('footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#ngay_sinh", {
            dateFormat: "Y-m-d",
            defaultDate: "2000-01-02"
        });
    </script>
</body>

</html>