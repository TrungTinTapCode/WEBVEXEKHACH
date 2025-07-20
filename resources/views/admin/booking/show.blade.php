@extends('admin.layouts.app')

@section('title', 'Chi tiết Đặt vé: ' . $booking->booking_code)

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chi tiết Đặt vé: {{ $booking->booking_code }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Thông tin chung</h4>
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Khách hàng</th>
                        <td>{{ $booking->customer->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td>{{ $booking->customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Chuyến đi</th>
                        <td>
                            {{ $booking->schedule->route->departure_point }} → 
                            {{ $booking->schedule->route->arrival_point }}
                            <br>
                            <small>Khởi hành: {{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</small>
                        </td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td class="font-weight-bold">{{ number_format($booking->total_amount) }} VND</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                            <form action="{{ route('admin.booking.update-status', $booking->booking_id) }}" 
                                method="POST" class="form-inline">
                                @csrf
                                <select name="status" class="form-control form-control-sm mr-2">
                                    @foreach(['pending', 'confirmed', 'cancelled', 'completed'] as $status)
                                    <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>
                                        {{ __('booking.status.' . $status) }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Thanh toán</th>
                        <td>
                            <span class="badge 
                                @if($booking->payment_status == 'paid') badge-success
                                @elseif($booking->payment_status == 'refunded') badge-info
                                @else badge-danger @endif">
                                {{ __('booking.payment.' . $booking->payment_status) }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-6">
                <h4>Danh sách ghế</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Số ghế</th>
                                <th>Loại ghế</th>
                                <th>Hành khách</th>
                                <th>Giá vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->details as $detail)
                            <tr>
                                <td>{{ $detail->seat->seat_number }}</td>
                                <td>{{ __('seat.type.' . $detail->seat->seat_type) }}</td>
                                <td>{{ $detail->passenger_name }}</td>
                                <td>{{ number_format($detail->price) }} VND</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <h4 class="mt-4">Lịch sử thanh toán</h4>
                @if($booking->payments->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã giao dịch</th>
                            <th>Số tiền</th>
                            <th>Phương thức</th>
                            <th>Ngày thanh toán</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->payments as $payment)
                        <tr>
                            <td>{{ $payment->transaction_code }}</td>
                            <td>{{ number_format($payment->amount) }} VND</td>
                            <td>{{ __('payment.method.' . $payment->payment_method) }}</td>
                            <td>{{ $payment->payment_date->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge 
                                    @if($payment->status == 'completed') badge-success
                                    @elseif($payment->status == 'pending') badge-warning
                                    @else badge-danger @endif">
                                    {{ __('payment.status.' . $payment->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-info">Chưa có thanh toán nào</div>
                @endif
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>
</div>
@endsection