<div class="sidebar">
    <div class="sidebar-brand p-4 d-flex align-items-center">
        <h2 class="m-0 text-white">
            <i class="fas fa-bus me-2"></i>
            <b>COSMO BUS ADMIN</b>
        </h2>
    </div>

    <div class="sidebar-menu px-3 py-4">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.routes.index') }}" class="nav-link {{ request()->routeIs('admin.routes.*') ? 'active' : '' }}">
                    <i class="fas fa-route"></i> Quản lý Tuyến đường
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.buses.index') }}" class="nav-link {{ request()->routeIs('admin.buses.*') ? 'active' : '' }}">
                    <i class="fas fa-bus"></i> Quản lý Xe
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.schedules.index') }}" class="nav-link {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Lịch trình
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.booking.index') }}" class="nav-link {{ request()->routeIs('admin.booking.*') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt"></i> Đặt vé
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Khách hàng
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-chart-bar"></i> Báo cáo
                </a>
                <ul class="dropdown-menu bg-primary">
                    <li>
                        <a class="dropdown-item text-white" href="#">Doanh thu</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-white" href="#">Chuyến đi</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
