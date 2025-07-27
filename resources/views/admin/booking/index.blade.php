@extends('admin.layouts.app')

@section('title', 'Quản lý Đặt vé')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách Đặt vé</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Mã đặt vé</th>
                    <th>Khách hàng</th>
                    <th>Chuyến đi</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Ngày đặt</th>
                    <th>Chi tiết vé</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->customer->full_name }}</td>
                    <td>
                        {{ $booking->schedule->route->departure }} →
                        {{ $booking->schedule->route->destination }}<br>
                        <br>
                        <small>{{ $booking->schedule->departure_time->format('d/m/Y H:i') }}</small>
                    </td>
                    <td>{{ number_format($booking->total_amount) }} VND</td>
                    <td>
                        @php
                            $statusLabels = [
                                'pending' => 'Chờ xác nhận',
                                'confirmed' => 'Đã xác nhận',
                                'cancelled' => 'Đã hủy',
                                'completed' => 'Hoàn thành'
                            ];
                        @endphp
                        <span class="badge
                            @if($booking->status == 'pending') badge-success text-dark
                            @elseif($booking->status == 'cancelled') badge-danger text-dark
                            @elseif($booking->status == 'confirmed') badge-info text-dark
                            @else badge-warning text-dark @endif">
                            {{ $statusLabels[$booking->status] ?? $booking->status }}
                        </span>
                    </td>
                    <td>
                        @php
                            $paymentLabels = [
                                'unpaid' => 'Chưa thanh toán',
                                'paid' => 'Đã thanh toán',
                                'refunded' => 'Đã hoàn tiền'
                            ];
                        @endphp
                        <span class="badge
                            @if($booking->payment_status == 'paid') badge-success text-dark
                            @elseif($booking->payment_status == 'refunded') badge-info text-dark
                            @else badge-danger text-dark @endif">
                            {{ $paymentLabels[$booking->payment_status] ?? $booking->payment_status }}
                        </span>
                    </td>
                    <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.booking.show', $booking->booking_id) }}"
                        class="btn btn-sm btn-primary" title="Xem chi tiết">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection
