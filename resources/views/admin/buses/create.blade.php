@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3><i class="fas fa-plus"></i> Thêm xe buýt mới</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.buses.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên xe</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="seats" class="form-label">Số ghế</label>
                    <input type="number" name="seats" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="license_plate" class="form-label">Biển số</label>
                    <input type="text" name="license_plate" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
