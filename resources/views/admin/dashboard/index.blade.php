<?php
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@php
    // Dữ liệu mẫu để test giao diện tại chưa có dữ liệu thực
    $totalRoutes = 15;
    $totalBuses = 8;
    $todayBookings = 23;
    $todayRevenue = 12500000;

    $recentBookings = [
        (object)[
            'booking_id' => 1,
            'booking_code' => 'BK20230001',
            'customer' => (object)['full_name' => 'Nguyễn Văn A'],
            'total_amount' => 350000,
            'created_at' => now()->subHours(2)
        ],
        (object)[
            'booking_id' => 2,
            'booking_code' => 'BK20230002',
            'customer' => (object)['full_name' => 'Trần Thị B'],
            'total_amount' => 420000,
            'created_at' => now()->subHours(5)
        ]
    ];

    $revenueChart = [
        'labels' => ['15/05', '16/05', '17/05', '18/05', '19/05', '20/05', '21/05'],
        'data' => [12000000, 8000000, 15000000, 9000000, 11000000, 13000000, 12500000]
    ];
@endphp

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Tổng tuyến đường</h6>
                        <h3 class="card-text">{{ $totalRoutes }}</h3>
                    </div>
                    <i class="fas fa-route fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Tổng xe</h6>
                        <h3 class="card-text">{{ $totalBuses }}</h3>
                    </div>
                    <i class="fas fa-bus fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Đặt vé hôm nay</h6>
                        <h3 class="card-text">{{ $todayBookings }}</h3>
                    </div>
                    <i class="fas fa-ticket-alt fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Doanh thu hôm nay</h6>
                        <h3 class="card-text">{{ number_format($todayRevenue) }} VND</h3>
                    </div>
                    <i class="fas fa-money-bill-wave fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0">Doanh thu 7 ngày gần nhất</h6>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="m-0">Đặt vé gần đây</h6>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($recentBookings as $booking)
                    <a href="{{ route('admin.booking.show', $booking->booking_id) }}"
                       class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">#{{ $booking->booking_code }}</h6>
                            <small>{{ $booking->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">{{ $booking->customer->full_name }}</p>
                        <small>{{ number_format($booking->total_amount) }} VND</small>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Revenue Chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($revenueChart['labels']),
            datasets: [{
                label: 'Doanh thu',
                data: @json($revenueChart['data']),
                backgroundColor: '#0090ff',
                borderColor: '#0077cc',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
@endsection
