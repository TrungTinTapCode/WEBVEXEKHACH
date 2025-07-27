@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Báo cáo doanh thu</h3>
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
