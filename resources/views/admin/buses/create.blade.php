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
                <label for="license_plate" class="form-label">Biển số xe</label>
                <input type="text" name="license_plate" class="form-control" required maxlength="20">
                @error('license_plate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bus_type" class="form-label">Loại xe</label>
                <input type="text" name="bus_type" class="form-control" required maxlength="50">
                @error('bus_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="total_seats" class="form-label">Tổng số ghế</label>
                <input type="number" name="total_seats" class="form-control" required min="1">
                @error('total_seats')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amenities" class="form-label">Tiện nghi (nếu có)</label>
                <textarea name="amenities" class="form-control"></textarea>
                @error('amenities')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
    </div>
</div>
@endsection
