@extends('admin.layouts.app')

@section('title', 'Quản lý Đặt vé')

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
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px;
        border-bottom: none;
    }

    .card-title {
        margin: 0;
        font-size: 1.25rem;
    }

    .card-tools .input-group {
        width: 250px;
    }

    .btn-primary {
        background-color: #069dd6;
        border-color: #069dd6;
    }

    .btn-primary:hover {
        background-color: #058bbf;
        border-color: #058bbf;
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

    thead.bg-primary {
        background-color: #07bff !important;
    }

    .badge {
        padding: 6px 12px;
        font-size: 0.85rem;
        border-radius: 12px;
    }

    .badge-success {
        background-color: #a8e6cf;
        color: #2d4739;
    }

    .badge-info {
        background-color: #d0f0fd;
        color: #155774;
    }

    .badge-danger {
        background-color: #fcdede;
        color: #7e1c1c;
    }

    .badge-warning {
        background-color: #fff4c2;
        color: #8a6d1d;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 0.875rem;
    }

    .mt-3 {
        margin-top: 1.5rem !important;
    }

    .pagination {
        justify-content: center;
    }
</style>

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-black">Danh sách Đặt vé</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control text-black" placeholder="Tìm kiếm...">
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
            <thead class="bg-primary text-black">
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
