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
                        <td>{{ $booking->customer->full_name ?? old('name') }}</td>
                    </tr>
                    <tr>
                        <th>Điện thoại</th>
                        <td>{{ $booking->customer->phone_number ?? old('phone') }}</td>
                    </tr>
                    <tr>
                        <th>Chuyến đi</th>
                        <td>
        @if($booking->schedule && $booking->schedule->route)
            {{ $booking->schedule->route->departure }} →
            {{ $booking->schedule->route->destination }}<br>
            <br>
            <small>Khởi hành: {{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</small>
        @else
            <span class="text-danger">Không có thông tin chuyến đi</span>
        @endif
    </td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td class="font-weight-bold">{{ number_format($booking->total_amount) }} VND</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                            @php
                                $statusLabels = [
                                    'pending' => 'Chờ xác nhận',
                                    'confirmed' => 'Đã xác nhận',
                                    'cancelled' => 'Đã hủy',
                                    'completed' => 'Hoàn thành'
                                ];
                                $canUpdate = in_array($booking->status, ['pending', 'confirmed']);
                            @endphp

                            <span class="badge
                                @if($booking->status == 'confirmed') badge-success text-dark
                                @elseif($booking->status == 'cancelled') badge-danger text-dark
                                @elseif($booking->status == 'completed') badge-info text-dark
                                @else badge-warning text-dark @endif">
                                {{ $statusLabels[$booking->status] ?? $booking->status }}
                            </span>
                            <!-- hai nút update,hủy -->
                            @if($canUpdate)
                                <form action="{{ route('admin.booking.update-status', $booking->booking_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary ml-2">Cập nhật</button>
                                </form>
                                <form action="{{ route('admin.booking.update-status', $booking->booking_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn hủy vé này?');">
                                    @csrf
                                    <input type="hidden" name="cancel" value="1">
                                    <button type="submit" class="btn btn-sm btn-danger ml-2">Hủy vé</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Thanh toán</th>
                        <td>
                            <span class="badge 
                                @if($booking->payment_status == 'paid') badge-success text-dark
                                @elseif($booking->payment_status == 'refunded') badge-info text-dark
                                @else badge-danger text-dark @endif">
                                {{ $paymentLabels[$booking->payment_status] ?? $booking->payment_status }}
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
                                <th>Giá vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking->details as $detail)
                            <tr>
                                <td>{{ $detail->seat->seat_number }}</td>
                                <td>
                                    @php
                                        $seatTypes = [
                                            'normal' => 'Ghế thường',
                                            'vip' => 'Ghế VIP',
                                            'bed' => 'Giường nằm'
                                        ];
                                    @endphp
                                    {{ $seatTypes[$detail->seat->seat_type] ?? $detail->seat->seat_type }}
                                </td>
                                <td>{{ number_format($detail->price) }} VND</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
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