@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background: url('/img/bgr8.jpg') no-repeat center center fixed;
        background-size: cover;
        background-color: #f4f4f4;
    }

    .container {
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.96);
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: transparent;
        border-bottom: none;
    }

    .card-header h3 {
        background-color: #07bff;
        color: #fff;
        border-radius: 6px;
        padding: 8px 16px;
        margin: 0;
        font-size: 1.25rem;
    }

    .btn-primary {
        background-color: #07bff;
        border-color: #07bff;
    }

    .btn-primary:hover {
        background-color: #069dd6;
        border-color: #0588b6;
    }

    .table {
        background-color: #fff;
    }

    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
    }

    thead {
        background-color: #07bff;
        color: white;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 0.875rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 12px;
    }

    .text-muted {
        font-size: 1rem;
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="px-3 py-2 text-black"  border-radius: 5px;>Danh sách lịch trình</h3>
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
                    <!-- <th>Ghi chú</th> -->
                    <th>Trạng thái</th>
                    <th>Hoàn thành</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->schedule_id }}</td>
                    <td>{{ $schedule->route->title ?? 'N/A' }}</td>
                    <td>{{ $schedule->bus->bus_name ?? 'Chưa gán xe' }}</td>
                    <td>{{ $schedule->departure_time ? $schedule->departure_time->format('H:i d/m/Y') : '-' }}</td>
                    <td>{{ $schedule->arrival_time ? $schedule->arrival_time->format('H:i d/m/Y') : '-' }}</td>
                    <!-- <td>{{ $schedule->notes ?? '-' }}</td> -->
                    <td>
                        @php
                            $statusLabels = [
                                'scheduled' => 'Đã lên lịch',
                                'departed' => 'Đang khởi hành',
                                'arrived' => 'Đã đến',
                                'cancelled' => 'Đã hủy'
                            ];

                            $statusClasses = [
                                'scheduled' => 'bg-primary text-white',
                                'departed' => 'bg-info text-dark',
                                'arrived' => 'bg-success text-white',
                                'cancelled' => 'bg-danger text-white',
                            ];

                            $status = $schedule->status;
                        @endphp
                        <span class="badge {{ $statusClasses[$status] ?? 'bg-secondary text-white' }}">
                            {{ $statusLabels[$status] ?? ucfirst($status) }}
                        </span>
                    </td>
                    <td>{{ $schedule->completed ? '✓' : '✗' }}</td>
                    <td>
                                <a href="{{ route('admin.schedules.edit', $schedule->schedule_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->schedule_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
