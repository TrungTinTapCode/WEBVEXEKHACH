@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Chỉnh sửa tuyến xe</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.routes.update', $route->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Tên tuyến</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="old_price" class="form-label">Giá cũ (nếu có)</label>
                    <input type="number" name="old_price" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="bg_color" class="form-label">Màu nền (mã HEX, ví dụ: #07bff)</label>
                    <input type="text" name="bg_color" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
