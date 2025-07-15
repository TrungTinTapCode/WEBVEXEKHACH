<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        .form-select, .form-control {
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
                <label class="form-label" for="phone">Số điện thoại</label>
                <div class="input-group">
                    <select class="form-select" style="max-width: 200px;">
                        <option selected>(Việt Nam)+84</option>
                        <!-- Có thể thêm quốc gia khác -->
                    </select>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="">
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
        </form>

        <div class="text-star text-link">
            Bạn đã có tài khoản? <a href="{{ route('login.user') }}">Đăng nhập</a>
        </div>
    </div>
</body>
</html>
