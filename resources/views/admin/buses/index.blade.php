@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="px-3 py-2" style="background-color: #07bff; border-radius: 5px;">Danh sách xe buýt</h3>
        <a href="{{ route('admin.buses.create') }}" class="btn btn-primary" style="background-color: #07bff;"><i class="fas fa-plus"></i> Thêm xe buýt</a>
    </div>

    <div class="card shadow">
        <div class="card-body" style="background-color: #fff;">
            <table class="table table-bordered">
                <thead style="background-color: #07bff; color: #fff;">
                    <tr>
                        <th>#</th>
                        <th>Tên xe</th>
                        <th>Số ghế</th>
                        <th>Biển số</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buses as $bus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bus->name }}</td>
                        <td>{{ $bus->seats }}</td>
                        <td>{{ $bus->license_plate }}</td>
                        <td>
                            <a href="{{ route('admin.buses.show', $bus->id) }}" class="btn btn-sm text-white" style="background-color: #07bff;">Xem</a>
                            <a href="{{ route('admin.buses.edit', $bus->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.buses.destroy', $bus->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
