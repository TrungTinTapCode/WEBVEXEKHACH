@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Chỉnh sửa tuyến xe</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.routes.update', $route->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Tên tuyến</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $route->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $route->price) }}" required>
                </div>

                <div class="mb-3">
                    <label for="departure" class="form-label">Nơi đi</label>
                    <input type="text" name="departure" id="departure" class="form-control" value="{{ old('departure', $route->departure ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="destination" class="form-label">Nơi đến</label>
                    <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination', $route->destination ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @if($route->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $route->image) }}" alt="{{ $route->title }}" width="150">
                        </div>
                    @endif
                </div>

                <!-- Checkbox is_active -->
                <div class="mb-3 form-check">
                <!-- Hidden để đảm bảo luôn gửi giá trị nếu checkbox không check -->
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1"
                    {{ old('is_active', $route->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Kích hoạt tuyến</label>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
