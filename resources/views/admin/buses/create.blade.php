@extends('admin.layouts.app')

@section('content')<style>
    body {
        background: url('/img/bgr8.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.97);
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        margin-top: 40px;
    }

    .card-header {
        background-color: #07bff !important;
        color: white;
        padding: 16px 24px;
        font-size: 20px;
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
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #07bff;
        box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        background-color: #07bff;
        border-color: #07bff;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #049cd8;
        border-color: #049cd8;
    }

    .btn-secondary {
        border-radius: 8px;
    }

    .text-danger {
        font-size: 0.875rem;
        margin-top: 4px;
    }
</style>


<div class="container">
    <div class="card shadow">
        <div class="card-header" >
            <h3 class="text-black"><i class="fas fa-plus"></i> Thêm xe buýt mới</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
        <form action="{{ route('admin.buses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bus_name" class="form-label">Tên nhà xe</label>
                <input type="text" name="bus_name" class="form-control" required maxlength="50">
                @error('bus_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

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
