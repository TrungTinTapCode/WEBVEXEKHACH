<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'sans-serif' ;
        }
        .login-box {
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
                <label for="phone" class="form-label">Số điện thoại</label>
                <div class="input-group">
                    <select class="form-select" style="max-width: 200px;">
                        <option selected>(Việt Nam)+84</option>
                        <!-- Thêm quốc gia khác nếu muốn -->
                    </select>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="">
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
        </form>

        <div class="text-star text-link">
            Bạn đã có tài khoản? <a href="{{route('register.user')}}">Đăng ký</a>
        </div>
    </div>
</body>
</html>
