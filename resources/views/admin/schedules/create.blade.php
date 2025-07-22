@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Thêm lịch trình mới</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.schedules.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="route_id" class="form-label">Tuyến xe</label>
                    <select name="route_id" class="form-control" required>
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}">{{ $route->start_point }} → {{ $route->end_point }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bus_id" class="form-label">Xe buýt</label>
                    <select name="bus_id" class="form-control" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->id }}">{{ $bus->bus_name }} ({{ $bus->license_plate }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="departure_time" class="form-label">Giờ khởi hành</label>
                    <input type="datetime-local" name="departure_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
