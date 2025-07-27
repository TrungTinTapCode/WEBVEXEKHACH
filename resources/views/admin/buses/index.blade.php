@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background: url('/img/bgr8.jpg') no-repeat center center fixed;
        background-size: cover;
        background-color: #f4f4f4;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.79);
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .card-header h3 {
        color: black;
        background-color:rgb(255, 255, 255);
        display: inline-block;
        /* padding: 6px 15px; */
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .table thead {
        background-color: #007bff;
        color: white;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .btn-warning, .btn-danger {
        margin-right: 5px;
    }

    /* .container {
        padding-top: 40px;
        padding-bottom: 40px;
    } */
</style>

<div class="container">
    <div class="card shadow">

        <div class="card-body">
            <div class="card-header">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="px-3 py-2" style="background-color: #07bff; border-radius: 5px;">Danh sách xe buýt</h3>
                <a href="{{ route('admin.buses.create') }}" class="btn btn-primary" style="background-color: #07bff;"><i class="fas fa-plus"></i> Thêm xe buýt</a>
            </div>
        </div>
            <table class="table table-bordered">
                <thead color: #fff;>
                    <tr>
                        <th>#</th>
                        <th>Tên nhà xe</th>
                        <th>Biển số xe</th>
                        <th>Loại xe</th>
                        <th>Tổng số ghế</th>
                        <th>Tiện nghi</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buses as $bus)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bus->bus_name }}</td>
                        <td>{{ $bus->license_plate }}</td>
                        <td>{{ $bus->bus_type }}</td>
                        <td>{{ $bus->total_seats }}</td>
                        <td>{{ $bus->amenities ?? 'Không có' }}</td>
                        <td>
                            <!-- Show đang lỗi -->
                            <!--<a href="{{ route('admin.buses.show', $bus->bus_id) }}" class="btn btn-info">Xem</a>-->
                            <a href="{{ route('admin.buses.edit', $bus->bus_id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.buses.destroy', $bus->bus_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?')">
                                    <i class="fas fa-trash"></i>
                                </button>
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
