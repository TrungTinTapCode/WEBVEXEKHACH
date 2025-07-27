<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            background-color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .register-box {
            width: 100%;
            max-width: 700px;
            padding: 60px 40px;
            border-radius: 10px;
            color: #000;
            /* background: url('{{ asset('/img/dn.jpg') }}') no-repeat center center; */
            background-size: 1000px auto;
            /* 👈 Bạn chỉnh kích thước ảnh ở đây */
            background-repeat: no-repeat;
            background-position: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .register-box form,
        .register-box h4,
        .register-box .text-link,
        .register-box .alert {
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            padding:22px;
        }

        .btn-custom {
            background-color: #ddd;
            border: none;
            color: #000;
            font-size: 22px;
            height: 65px;
        }

        .btn-custom:hover {
            background-color: #ccc;
        }

        .form-select,
        .form-control {
            height: 65px;
            font-size: 22px;
        }

        .form-label {
            font-size: 22px;
        }

        h4 {
            font-size: 26px;
        }

        .text-link a {
            text-decoration: none;
            font-size: 20px;
        }

        .text-link {
            font-size: 20px;
        }

        body::before {
    content: "";
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url('{{ asset('img/bgr.jpg') }}') center/cover no-repeat;
    /* opacity: 0.2; chỉnh độ mờ ở đây */
    z-index: -1;
    /* Nếu muốn làm mờ bằng blur: bỏ comment dòng dưới */
    filter: blur(2px);
}

/* Nếu bạn vẫn muốn nền cho phần .thongtin thì giữ lại, hoặc xoá đi nếu chỉ dùng cho toàn trang */
.register-container {
    /* Có thể xóa nếu bạn đã dùng ::before cho body */
    /* background-image: url('{{ asset('img/bgr.jpg') }}'); */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    /* padding: 50px 0; */
    margin-bottom: 50px;

}


    </style>
</head>

<body>
    @include('header')

    <div class="register-container">
        <div class="register-box">


            @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('register.user') }}">
                @csrf
                <div class="mb-4">
                    <h4 class="text-center mb-4">ĐĂNG KÝ</h4>
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="mb-4">
                    <label for="phone_number" class="form-label">Số điện thoại</label>
                    <div class="input-group">
                        <select class="form-select" style="max-width: 200px;">
                            <option selected>(Việt Nam)+84</option>
                        </select>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-custom w-100 mb-4">ĐĂNG KÝ</button>
                <div class="text-link text-center mt-3">
                Đã có tài khoản? <a href="{{ route('login.user') }}">Đăng nhập</a>
            </div>
            </form>


        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
