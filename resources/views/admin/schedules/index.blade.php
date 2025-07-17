@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="px-3 py-2" style="background-color: #07bff; border-radius: 5px;">Danh sách lịch trình</h3>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm lịch trình</a>
    </div>

    <div class="card shadow">
        <div class="card-body" style="background-color: #fff;">
            <table class="table table-bordered">
                <thead style="background-color: #07bff; color: #fff;">
                    <tr>
                        <th>#</th>
                        <th>Tuyến</th>
                        <th>Xe buýt</th>
                        <th>Giờ khởi hành</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $schedule->route->start_point }} → {{ $schedule->route->end_point }}</td>
                            <td>{{ $schedule->bus->name }} ({{ $schedule->bus->license_plate }})</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->departure_time)->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
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
