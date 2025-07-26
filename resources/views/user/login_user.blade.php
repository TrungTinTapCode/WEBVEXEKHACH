<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> -->
    <style>
        body {
            /* background-color: #fff; */
            /* background-image: url('/img/bgr.jpg'); */
             /* background-image: url('{{ asset('/img/bgr.jpg') }}'); */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dn {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 600px;
            padding: 60px 40px;
            border-radius: 10px;
            color: #000;
            background-size: 1000px auto;
            background-repeat: no-repeat;
            background-position: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-box form,
        .login-box h4,
        .login-box .text-link,
        .login-box .alert {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 10px;
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

    </style>
</head>

<body>
    @include('header')

    <div class="dn">
        <div class="login-box">
            <h4 class="text-center mb-4">ĐĂNG NHẬP</h4>

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

            <form method="POST" action="{{ route('login.user') }}">
                @csrf
                <div class="mb-4">
                    <label for="phone_number" class="form-label">Số điện thoại</label>
                    <div class="input-group">
                        <select class="form-select" style="max-width: 200px;">
                            <option selected>(Việt Nam)+84</option>
                        </select>
                        <input type="text" class="form-control" name="phone_number" id="phone_number">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
            </form>

            <div class="text-star text-link text-center mt-3">
                Bạn chưa có tài khoản? <a href="{{ route('register.user') }}">Đăng ký</a>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
