@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Báo cáo chuyến đi</h3>
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