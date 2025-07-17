<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .register-box {
            width: 100%;
            max-width: 600px;
            padding: 40px;
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
            font-family: "Times New Roman", Times, serif;
        }

        .text-link a {
            text-decoration: none;
            font-size: 20px;
        }

        .text-link {
            font-size: 20px;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="main-content">
        <div class="register-box">
            <h4 class="text-center mb-4">ĐĂNG KÝ</h4>

            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.user') }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label" for="phone_number">Số điện thoại</label>
                    <div class="input-group">
                        <select class="form-select" style="max-width: 200px;">
                            <option selected>(Việt Nam)+84</option>
                        </select>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                </div>

                <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
            </form>

            <div class="text-start text-link">
                Bạn đã có tài khoản? <a href="{{ route('login.user') }}">Đăng nhập</a>
            </div>
        </div>
    </div>

    @include('footer')
</body>

</html>
