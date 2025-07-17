<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            background-color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .register-box {
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        footer {
            background-color: #f1f1f1;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>
    {{-- HEADER --}}
    @include('header')

    {{-- MAIN FORM --}}
    <main>
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
                        <input type="text" class="form-control" name="phone_number" id="phone_number" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-custom w-100 mb-4">TIẾP TỤC</button>
            </form>

            <div class="text-start text-link">
                Bạn đã có tài khoản? <a href="{{ route('login.user') }}">Đăng nhập</a>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    @include('footer')
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
