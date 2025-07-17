@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header" style="background-color: #07bff;">
            <h3>Chỉnh sửa thông tin xe buýt</h3>
        </div>
        <div class="card-body" style="background-color: #fff;">
            <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Tên xe</label>
                    <input type="text" name="name" class="form-control" value="{{ $bus->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="seats" class="form-label">Số ghế</label>
                    <input type="number" name="seats" class="form-control" value="{{ $bus->seats }}" required>
                </div>
                <div class="mb-3">
                    <label for="license_plate" class="form-label">Biển số</label>
                    <input type="text" name="license_plate" class="form-control" value="{{ $bus->license_plate }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.buses.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection
