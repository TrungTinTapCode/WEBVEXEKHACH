@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Chỉnh sửa lịch trình</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.schedules.update', $schedule->schedule_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="route_id" class="form-label">Tuyến xe</label>
                    <select name="route_id" class="form-control" required>
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}" {{ $route->id == $schedule->route_id ? 'selected' : '' }}>
                                {{ $route->departure }} → {{ $route->destination }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bus_id" class="form-label">Xe buýt</label>
                    <select name="bus_id" class="form-control" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->bus_id }}" {{ $bus->id == $schedule->bus_id ? 'selected' : '' }}>
                                {{ $bus->bus_name }} ({{ $bus->license_plate }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="departure_time" class="form-label">Giờ khởi hành</label>
                    <input type="datetime-local" name="departure_time" class="form-control"
                        value="{{ \Carbon\Carbon::parse($schedule->departure_time)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="arrival_time" class="form-label">Giờ đến</label>
                    <input type="datetime-local" name="arrival_time" class="form-control"
                        value="{{ \Carbon\Carbon::parse($schedule->arrival_time)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="form-control" required>
                        @foreach (['scheduled', 'departed', 'arrived', 'cancelled'] as $status)
                            <option value="{{ $status }}" {{ $schedule->status === $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
