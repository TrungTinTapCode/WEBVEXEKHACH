@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Chỉnh sửa thông tin xe buýt</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.buses.update', $bus->bus_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="license_plate" class="form-label">Biển số xe</label>
                    <input type="text" name="license_plate" class="form-control" value="{{ $bus->license_plate }}" required maxlength="20">
                    @error('license_plate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bus_type" class="form-label">Loại xe</label>
                    <input type="text" name="bus_type" class="form-control" value="{{ $bus->bus_type }}" required maxlength="50">
                    @error('bus_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="total_seats" class="form-label">Tổng số ghế</label>
                    <input type="number" name="total_seats" class="form-control" value="{{ $bus->total_seats }}" required min="1">
                    @error('total_seats')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="amenities" class="form-label">Tiện nghi (nếu có)</label>
                    <textarea name="amenities" class="form-control">{{ $bus->amenities }}</textarea>
                    @error('amenities')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
