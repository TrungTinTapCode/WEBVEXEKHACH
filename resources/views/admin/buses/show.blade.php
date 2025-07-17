@extends('admin.layouts.app')

@section('title', 'Quản lý ghế xe: ' . $bus->license_plate)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/bus_show.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Quản lý ghế xe: {{ $bus->license_plate }}</h3>
                <p class="mb-0">Loại xe: {{ $bus->bus_type }}</p>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeatModal">
                    <i class="fas fa-plus"></i> Thêm ghế
                </button>
                <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="bus-seats">
            @foreach($seats->groupBy(function($item) {
                return substr($item->seat_number, 0, 1);
            }) as $row => $seatsInRow)
            <div class="seat-row mb-3">
                <h5>Hàng {{ $row }}</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($seatsInRow as $seat)
                    <div class="seat-item {{ $seat->seat_type }} {{ $seat->is_available ? 'available' : 'booked' }}"
                         data-bs-toggle="tooltip" title="{{ $seat->seat_number }} - {{ ucfirst($seat->seat_type) }}">
                        <span>{{ $seat->seat_number }}</span>
                        <div class="seat-actions">
                            <button class="btn btn-sm btn-warning edit-seat" data-id="{{ $seat->seat_id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add Seat Modal -->
<div class="modal fade" id="addSeatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addSeatForm" action="{{ route('admin.seats.store') }}" method="POST">
                @csrf
                <input type="hidden" name="bus_id" value="{{ $bus->bus_id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm ghế mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Số ghế</label>
                        <input type="text" class="form-control" name="seat_number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại ghế</label>
                        <select class="form-select" name="seat_type" required>
                            <option value="normal">Thường</option>
                            <option value="vip">VIP</option>
                            <option value="window">Cửa sổ</option>
                            <option value="aisle">Lối đi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm ghế</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Seat Modal -->
<div class="modal fade" id="editSeatModal" tabindex="-1" aria-hidden="true">
    <!-- Nội dung tương tự add modal nhưng cho chỉnh sửa -->
</div>
@endsection

@push('scripts')
<script>
// Code JavaScript để xử lý thêm/sửa ghế
</script>
@endpush