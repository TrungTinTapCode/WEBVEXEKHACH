@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="px-3 py-2" style="background-color: #07bff; border-radius: 5px;">Danh sách lịch trình</h3>
                <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm lịch trình</a>
            </div>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <table class="table table-bordered">
                <thead style="background-color: #07bff; color: #fff;">
                    <tr>
                    <th>ID</th>
                    <th>Tuyến</th>
                    <th>Xe</th>
                    <th>Giờ đi dự kiến</th>
                    <th>Giờ đến dự kiến</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->schedule_id }}</td>
                    <td>{{ $schedule->route->title ?? 'N/A' }}</td>
                    <td>{{ $schedule->bus->name ?? 'Chưa gán xe' }}</td>
                    <td>{{ $schedule->departure_time ? $schedule->departure_time->format('H:i d/m/Y') : '-' }}</td>
                    <td>{{ $schedule->arrival_time ? $schedule->arrival_time->format('H:i d/m/Y') : '-' }}</td>
                    <td>{{ $schedule->notes ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $schedule->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($schedule->status) }}
                        </span>
                    </td>
                    <td>
                                <a href="{{ route('admin.schedules.edit', $schedule->schedule_id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->schedule_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            @if($schedules->isEmpty())
                <div class="text-center text-muted">Không có lịch trình nào.</div>
            @endif
        </div>
    </div>
</div>
@endsection
