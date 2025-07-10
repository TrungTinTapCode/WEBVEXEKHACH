<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-4 nav-link-hover-effect" href="{{ route('home') }}">
            <img src="{{ asset('img/IMG_9223.PNG') }}" alt="Logo"  width="18%"> </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5 nav-link-hover-effect" href="#"> <i class="bi bi-ticket-fill me-1" style="font-size: 1.3rem;"></i> Vé xe của tôi
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5 nav-link-hover-effect" href="#"> <i class="bi bi-geo-alt-fill me-1" style="font-size: 1.3rem;"></i> Hệ thống nhà xe
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link fs-5 nav-link-hover-effect" href="#"> <i class="bi bi-headset me-1" style="font-size: 1.3rem;"></i> Hotline 24/7
                    </a>
                </li>

                <li class="nav-item mx-2">
                    @guest
                        <a class="nav-link fs-5 nav-link-hover-effect" href="#"> <i class="bi bi-box-arrow-in-right me-1" style="font-size: 1.3rem;"></i> Đăng nhập
                        </a>
                    @else
                        <a class="nav-link fs-5 nav-link-hover-effect" href="#"> <i class="bi bi-box-arrow-right me-1" style="font-size: 1.3rem;"></i> Đăng xuất
                        </a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
