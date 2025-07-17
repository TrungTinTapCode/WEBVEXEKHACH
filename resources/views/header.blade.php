<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-4 nav-link-hover-effect" href="{{ route('home') }}">
            <img src="{{ asset('img/IMG_9223.PNG') }}" alt="Logo" width="18%">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5 nav-link-hover-effect" href="#">
                        <i class="bi bi-ticket-fill me-1" style="font-size: 1.3rem;"></i> Vé xe của tôi
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5 nav-link-hover-effect" href="#">
                        <i class="bi bi-geo-alt-fill me-1" style="font-size: 1.3rem;"></i> Hệ thống nhà xe
                    </a>
                </li>

                <!-- MCO Đại sứ Dropdown -->
                <li class="nav-item mx-2 dropdown">
                    <a class="nav-link fs-5 nav-link-hover-effect dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-infinity me-1" style="font-size: 1.3rem;"></i> Đối tác truyền thông
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="ttmco2024">
                                <span class="fw-bold">MISS COSMO 2024</span>
                                <small class="text-muted d-block">Tata Juliastrid</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="ttmcovn2025">
                                <span class="fw-bold">HOA HẬU HOÀN VŨ VIỆT NAM 2025</span>
                                <small class="text-muted d-block">Nguyễn Hoàng Phương Linh</small>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Hotline Dropdown -->
                <li class="nav-item mx-2 dropdown">
                    <a class="nav-link fs-5 nav-link-hover-effect dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-headset me-1" style="font-size: 1.3rem;"></i> Hotline 24/7
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="tel:1900969681">
                                <span class="fw-bold">1900.969.681</span>
                                <small class="text-muted d-block">Phản hồi dịch vụ</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="tel:1900888684">
                                <span class="fw-bold">1900.888.684</span>
                                <small class="text-muted d-block">Đặt vé (24/7)</small>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Dropdown Đăng nhập/Đăng ký (Đã sửa) -->
                <li class="nav-item mx-2 dropdown">
                    <a class="nav-link fs-5 nav-link-hover-effect dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1" style="font-size: 1.3rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="user/login">
                                <span class="fw-bold">Đăng nhập</span>
                                <small class="text-muted d-block">Truy cập tài khoản</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="user/register">
                                <span class="fw-bold">Đăng ký</span>
                                <small class="text-muted d-block">Tạo tài khoản mới</small>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
