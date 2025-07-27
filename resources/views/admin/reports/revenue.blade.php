@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background: url('/img/bgr8.jpg') no-repeat center center fixed;
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

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #bee5eb;
        border-radius: 8px;
    }

    .table {
        background-color: white;
        margin-bottom: 0;
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
                    <h3 class="card-title text-black">Báo cáo doanh thu</h3>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.reports.revenue') }}">
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

                    <div class="alert alert-info">
                        <h4>Tổng doanh thu: <strong>{{ number_format($totalRevenue) }} VNĐ</strong></h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã thanh toán</th>
                                    <th>Tuyến đường</th>
                                    <th>Số tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày thanh toán</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $index => $booking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $booking->booking_code }}</td>
                                    <td>
                                        @if($booking->schedule && $booking->schedule->route)
                                            {{ $booking->schedule->route->title }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-right">{{ number_format($booking->total_amount) }} VNĐ</td>
                                    <td>
                                        {{ $booking->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                    </td>
                                    <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
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
@endsection
