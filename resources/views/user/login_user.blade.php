<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
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

        .login-box {
            width: 100%;
            max-width: 500px;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #ddd;
            border: none;
            color: #000;
            font-size: 22px;
            height: 60px;
        }

        .btn-custom:hover {
            background-color: #ccc;
        }

        .form-select,
        .form-control {

            height: 60px;
            font-size: 20px;

            height: 65px;
            font-size: 22px;

        }

        .form-label {
            font-size: 20px;
        }

        h4 {
            font-size: 26px;

            font-weight: bold;
        }

        .text-link {
            font-size: 18px;
        }


            /* .font-family: "Times New Roman", Times, serif;
        } */


        .text-link a {
            text-decoration: none;
        }


        .alert {
            padding: 10px;
            border-radius: 8px;
        }
        .text-link {
            font-size: 20px;

        }
    </style>
</head>

<body>
    @include('header')

    <div class="dn">

    <div class="main-content">

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

                        <select class="form-select" style="max-width: 180px;">
                            <option selected>(Việt Nam)+84</option>
                        </select>
                        <input type="text" class="form-control" name="phone_number" id="phone_number">

                        <select class="form-select" style="max-width: 200px;">
                            <option selected>(Việt Nam)+84</option>
                        </select>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="" required>

                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password">

                    <input type="password" class="form-control" name="password" id="password" placeholder="" required>

                </div>

                <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
            </form>


            <div class="text-center text-link mt-3">
            <div class="text-start text-link">

                Bạn chưa có tài khoản? <a href="{{ route('register.user') }}">Đăng ký</a>
            </div>
        </div>
    </div>

    @include('footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


