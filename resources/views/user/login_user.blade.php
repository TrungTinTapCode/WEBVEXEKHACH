<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

      .dn {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /* background: url('{{ asset('/img/dn.jpg') }}') no-repeat center center; */
    background-size: 1000px ; /* 👈 bạn chỉnh kích thước tại đây */
    background-repeat: no-repeat;  /* 👈 nếu muốn lặp thì đổi thành repeat */
    padding: 20px;
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

        .text-link a {
            text-decoration: none;
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
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
                        <select class="form-select" style="max-width: 180px;">
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

            <div class="text-center text-link mt-3">
                Bạn chưa có tài khoản? <a href="{{ route('register.user') }}">Đăng ký</a>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
