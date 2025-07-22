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
        /* custom.css */

/* Khai báo biến CSS để dễ dàng quản lý màu sắc */
:root {
    --primary-color: #007bff; /* Màu xanh chính */
    --primary-hover-color: #0056b3; /* Màu xanh khi hover */
    --secondary-color: #6c757d; /* Màu xám phụ */
    --text-color: #343a40; /* Màu chữ chính */
    --light-gray: #f8f9fa; /* Màu nền nhẹ */
    --border-color: #dee2e6; /* Màu viền */
    --danger-color: #dc3545; /* Màu đỏ */
    --danger-hover-color: #bd2130; /* Màu đỏ khi hover */
}

/* Kiểu dáng chung cho body và font */
body {
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    background-color: var(--light-gray); /* Nền trang màu xám nhẹ */
    color: var(--text-color); /* Màu chữ mặc định */
    line-height: 1.6;
}

/* Điều chỉnh container chính */
.container5 {
    max-width: 760px; /* Giảm chiều rộng tối đa một chút để gọn gàng hơn */
    margin: 40px auto; /* Thêm khoảng cách trên dưới */
    padding: 30px; /* Tăng padding */
    background-color: #ffffff; /* Nền trắng sạch */
    border-radius: 12px; /* Bo tròn góc nhiều hơn */
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); /* Đổ bóng sâu hơn một chút */
    animation: fadeIn 0.8s ease-out; /* Thêm hiệu ứng fade in khi tải trang */
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Tiêu đề phần */
.section-title {
    color: var(--primary-color); /* Sử dụng màu xanh chính */
    font-weight: 700; /* Đậm hơn */
    font-size: 26px; /* Kích thước lớn hơn */
    text-transform: uppercase;
    margin-bottom: 25px; /* Khoảng cách dưới tiêu đề */
    text-align: center; /* Căn giữa tiêu đề */
    letter-spacing: 0.5px; /* Tăng khoảng cách chữ */
}

/* Ghi chú và dấu sao bắt buộc */
.note {
    font-size: 15px;
    color: var(--secondary-color); /* Màu xám cho ghi chú */
    margin-bottom: 25px;
    padding-left: 5px; /* Thêm padding nhỏ */
}

.required {
    color: var(--danger-color); /* Màu đỏ cho dấu sao */
    font-weight: bold;
}

/* Kiểu dáng cho label */
label {
    font-weight: 600;
    margin-bottom: 8px; /* Tăng khoảng cách dưới label */
    display: block;
    color: var(--text-color);
}

/* Kiểu dáng cho input và select */
select,
input[type="text"],
input[type="email"] {
    height: 48px; /* Chiều cao lớn hơn một chút */
    border-radius: 8px; /* Bo tròn nhiều hơn */
    border: 1px solid var(--border-color); /* Viền màu xám nhẹ */
    padding: 0 15px; /* Padding bên trong */
    transition: all 0.3s ease; /* Hiệu ứng chuyển động mượt mà */
    font-size: 16px;
    color: var(--text-color);
}

select:focus,
input[type="text"]:focus,
input[type="email"]:focus {
    border-color: var(--primary-color); /* Viền màu xanh khi focus */
    box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25); /* Đổ bóng nhẹ khi focus */
    outline: none; /* Bỏ outline mặc định */
}

/* Điều chỉnh input group */
.input-group .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group-text {
    background-color: var(--light-gray); /* Nền cho icon */
    border: 1px solid var(--border-color);
    border-left: 0;
    border-top-right-radius: 8px; /* Bo tròn góc cho icon */
    border-bottom-right-radius: 8px;
    color: var(--secondary-color);
    padding: 0 15px;
    font-size: 18px;
    display: flex;
    align-items: center;
}

/* Nút bấm */
.btn {
    padding: 12px 30px; /* Tăng padding nút */
    font-size: 17px;
    font-weight: 600;
    border-radius: 8px; /* Bo tròn nút */
    transition: all 0.3s ease; /* Hiệu ứng chuyển động */
    cursor: pointer;
    border: none; /* Bỏ viền mặc định */
}

.btn-primary {
    background-color: var(--primary-color);
    color: #ffffff;
}

.btn-primary:hover {
    background-color: var(--primary-hover-color);
    transform: translateY(-2px); /* Hiệu ứng nhấc nhẹ nút */
    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
}

.btn-danger {
    background-color: var(--danger-color);
    color: #ffffff;
}

.btn-danger:hover {
    background-color: var(--danger-hover-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.2);
}

/* Căn chỉnh lại các nút trong div chứa nút */
.mt-4.text-center {
    display: flex;
    justify-content: center;
    gap: 20px; /* Tăng khoảng cách giữa các nút */
    margin-top: 35px; /* Tăng khoảng cách trên */
}
/* custom.css */

/* Khai báo biến CSS để dễ dàng quản lý màu sắc */
:root {
    --primary-color: #007bff; /* Màu xanh chính */
    --primary-hover-color: #0056b3; /* Màu xanh khi hover */
    --secondary-color: #6c757d; /* Màu xám phụ */
    --text-color: #343a40; /* Màu chữ chính */
    --light-background-color: #f0f2f5; /* Màu nền nhẹ nhàng cho body */
    --container-background-color: #ffffff; /* Màu nền trắng cho container */
    --border-color: #dee2e6; /* Màu viền */
    --danger-color: #dc3545; /* Màu đỏ */
    --danger-hover-color: #bd2130; /* Màu đỏ khi hover */
}

/* Kiểu dáng chung cho body và font */
body {
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    background-color: var(--light-background-color); /* Sử dụng màu nền nhẹ cho body */
    color: var(--text-color); /* Màu chữ mặc định */
    line-height: 1.6;
}

/* Điều chỉnh container chính */
.container5 {
    max-width: 760px;
    margin: 40px auto;
    padding: 30px;
    background-color: var(--container-background-color); /* Đảm bảo container có nền trắng */
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.8s ease-out;
}

/* ... (giữ nguyên các phần CSS còn lại bạn đã có) ... */
    </style>
</head>

<body>
    @include('header')

    <div class="container5 py-4">
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
