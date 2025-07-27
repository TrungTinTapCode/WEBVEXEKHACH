@extends('admin.layouts.app')

@section('content')
<style>
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

    select.form-control,
    input[type="datetime-local"].form-control {
        padding: 10px;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-black">Thêm lịch trình mới</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.schedules.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="route_id" class="form-label">Tuyến xe</label>
                    <select name="route_id" class="form-control" required>
                    @foreach($routes as $route)
                    <option value="{{ $route->id }}">
                        {{ $route->title }} — ({{ $route->departure }} → {{ $route->destination }})
                    </option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bus_id" class="form-label">Xe buýt</label>
                    <select name="bus_id" class="form-control" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->bus_id }}">{{ $bus->bus_name }} ({{ $bus->license_plate }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="departure_time" class="form-label">Giờ khởi hành</label>
                    <input type="datetime-local" name="departure_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="arrival_time" class="form-label">Giờ đến (Dự kiến)</label>
                    <input type="datetime-local" name="arrival_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
