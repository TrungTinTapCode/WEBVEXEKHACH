@extends('admin.layouts.app')

@section('title', 'Quản lý Tuyến đường')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Quản lý Tuyến đường</h3>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('admin.routes.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Thêm tuyến đường
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Tên tuyến</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Nơi đi - Nơi đến</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($routes as $route)
                <tr>
                    <td>{{ $route->id }}</td>
                    <td>{{ $route->title }}</td>
                    <td>
                        @if($route->image)
                        <img src="{{ asset('storage/' . $route->image) }}" width="80" alt="{{ $route->title }}">
                        @endif
                    </td>
                    <td>{{ number_format($route->price) }} VND</td>
                    <td>{{ $route -> departure }} → {{ $route -> destination }}</td>
                    <td>
                        <span class="badge {{ $route->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $route->is_active ? 'Kích hoạt' : 'Ngừng hoạt động' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $route->id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $route->id }}" action="{{ route('admin.routes.destroy', $route->id) }}" method="POST" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                        <a href="{{ route('admin.routes.toggle-status', $route->id) }}" class="btn btn-sm {{ $route->is_active ? 'btn-secondary' : 'btn-success' }}">
                            <i class="fas {{ $route->is_active ? 'fa-times' : 'fa-check' }}"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Bạn có chắc chắn muốn xóa tuyến đường này?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush