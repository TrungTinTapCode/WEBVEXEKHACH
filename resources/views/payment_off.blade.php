<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt vé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .breadcrumb-item a {
            color: #0090ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .required {
            color: var(--danger-color);
            /* Màu đỏ cho dấu sao */
            font-weight: bold;
        }

        .card-header {
            background-color: #fff;
            font-weight: 600;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Quay lại</a></li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Cột bên trái: Thông tin liên hệ -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Thông tin liên hệ</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Tên người đi <span class="required">*</span></label>
                                <input type="text" class="form-control" value="Hoàng Huy" required>
                            </div>

                            <div class="mb-3 d-flex">
                                <select class="form-select w-auto me-2" style="max-width: 120px;">
                                    <option selected>VN +84</option>
                                </select>
                                <input type="tel" class="form-control" value="815278843" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control is-invalid" placeholder="Email để nhận thông tin đặt chỗ *">
                                <div class="invalid-feedback">
                                    Vui lòng nhập địa chỉ E-mail
                                </div>
                            </div>

                            <div class="alert alert-success mt-3">
                                ✅ Thông tin đơn hàng sẽ được gửi đến số điện thoại và email bạn cung cấp.
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cột bên phải: Thông tin chuyến đi -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-muted">
                                <i class="bi bi-bus-front"></i> <strong>Thứ 6, 25/07/2025</strong>
                            </div>
                            <a href="#" class="text-primary text-decoration-underline small">Chi tiết</a>
                        </div>

                        <div class="d-flex mb-3">
                            <img src="img/bus1.webp" alt="Bus Image" class="me-3 rounded" width="100" height="60">
                            <div>
                                <div class="fw-bold">Hạnh Cafe - Hà Phương Limousine</div>
                                <div class="text-muted small">Giường nằm 41 chỗ</div>
                                <div class="text-muted small">
                                    <i class="bi bi-person"></i> 1 &nbsp;
                                    <i class="bi bi-luggage"></i> C6 &nbsp;
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-2">
                            <div class="d-flex">
                                <div class="text-center me-3" style="width: 60px;">
                                    <div class="fw-bold">22:45</div>
                                    <div class="text-muted small">(25/07)</div>
                                    <div class="my-1">
                                        <span class="badge bg-primary rounded-circle" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">Văn phòng Quận 1</div>
                                    <div class="text-muted small">
                                        273 Phạm Ngũ Lão, Phường Phạm Ngũ Lão, Quận 1, Hồ Chí Minh
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1">
                            <div class="d-flex">
                                <div class="text-center me-3" style="width: 60px;">
                                    <div class="fw-bold text-danger">07:15</div>
                                    <div class="text-muted small">(26/07)</div>
                                    <div class="my-1">
                                        <span class="badge bg-danger rounded-circle" style="width: 8px; height: 8px;"></span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">Văn phòng 106 Phong Châu</div>
                                    <div class="text-muted small">
                                        106 Phong Châu, Phường Phước Hải, Nha Trang, Khánh Hòa
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>