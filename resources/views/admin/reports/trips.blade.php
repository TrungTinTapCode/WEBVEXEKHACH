@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background: url('/img/bgr.jpg') no-repeat center center fixed;
        background-size: cover;
        background-color: #f4f4f4;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.96);
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background-color: #07bff;
        color: #fff;
        padding: 16px;
        border-bottom: none;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-title {
        margin: 0;
        font-size: 1.25rem;
    }

    .form-control {
        border-radius: 8px;
        box-shadow: none;
        border-color: #ccc;
    }

    .btn-primary {
        background-color: #069dd6;
        border-color: #069dd6;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background-color: #058bbf;
        border-color: #058bbf;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        border-radius: 8px;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.75em;
        border-radius: 0.5rem;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
        text-align: center;
    }

    .thead-light th {
        background-color: #e9f5ff;
    }

    .table td.text-right {
        text-align: right;
    }

    .table-sm th,
    .table-sm td {
        padding: 0.5rem;
    }

    .modal-content {
        border-radius: 12px;
    }

    .modal-header {
        background-color: #f1f1f1;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        background-color: #f9f9f9;
    }

    .container {
        margin-top: 30px;
    }

    label {
        font-weight: 500;
    }

    .table-responsive {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-black">Báo cáo chuyến đi</h3>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.reports.trips') }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="start_date">Từ ngày</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="{{ $startDate }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date">Đến ngày</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ $endDate }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Lọc</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tuyến đường</th>
                                    <th>Số chuyến đi</th>
                                    <th>Doanh thu</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($routes as $route)
                                <tr>
                                    <td>{{ $route->title }}</td>
                                    <td class="text-center">{{ $route->bookings_count }}</td>
                                    <td class="text-right">{{ number_format($route->total_revenue) }} VNĐ</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#routeDetails{{ $route->id }}">
                                            <i class="fas fa-info-circle"></i> Chi tiết
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($routes as $route)
<div class="modal fade" id="routeDetails{{ $route->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết tuyến: {{ $route->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Mã đặt chỗ</th>
                                <th>Ngày đặt</th>
                                <th>Số khách</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($route->all_bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_id }}</td>
                                <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $booking->details->sum('quantity') }}</td>
                                <td>{{ number_format($booking->total_amount) }} VNĐ</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status === 'completed' ? 'success' : 'warning' }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
