@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background: url('/img/bgr8.jpg') no-repeat center center fixed;
        background-size: cover;
        background-color: #f4f4f4;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.96);
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .card-header {
        background-color: #07bff !important;
        color: #fff;
        padding: 16px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        border-color: #ccc;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #07bff;
        box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        background-color: #069dd6;
        border-color: #069dd6;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #058bbf;
        border-color: #058bbf;
    }

    .btn-secondary {
        border-radius: 8px;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="card-header" >
            <h3 class="text-black">Thêm tuyến xe mới</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.routes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Tên tuyến</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="departure" class="form-label">Nơi đi</label>
                    <input type="text" name="departure" id="departure" class="form-control" value="{{ old('departure', $route->departure ?? '') }}">
                </div>

                <div class="mb-3">
                <label for="destination" class="form-label">Nơi đến</label>
                <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination', $route->destination ?? '') }}">
                </div>


                <!-- <div class="mb-3">
                    <label for="bg_color" class="form-label">Màu nền (mã HEX, ví dụ: #07bff)</label>
                    <input type="text" name="bg_color" class="form-control">
                </div> -->

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
