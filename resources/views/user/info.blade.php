<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin hành khách</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            font-family: system-ui, sans-serif;
        }

        label {
            font-weight: 600;
        }

        .section-title {
            color: #0090ff;
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
        }

        .required {
            color: red;
        }

        .note {
            font-size: 14px;
            color: #777;
        }

        select,
        input[type="text"],
        input[type="email"] {
            height: 40px;
        }

        /* custom.css */

        /* Khai báo biến CSS để dễ dàng quản lý màu sắc */
        :root {
            --primary-color: #007bff;
            /* Màu xanh chính */
            --primary-hover-color: #0056b3;
            /* Màu xanh khi hover */
            --secondary-color: #6c757d;
            /* Màu xám phụ */
            --text-color: #343a40;
            /* Màu chữ chính */
            --light-gray: #f8f9fa;
            /* Màu nền nhẹ */
            --border-color: #dee2e6;
            /* Màu viền */
            --danger-color: #dc3545;
            /* Màu đỏ */
            --danger-hover-color: #bd2130;
            /* Màu đỏ khi hover */
        }

        /* Kiểu dáng chung cho body và font */
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            background-color: var(--light-gray);
            /* Nền trang màu xám nhẹ */
            color: var(--text-color);
            /* Màu chữ mặc định */
            line-height: 1.6;
        }

        /* Điều chỉnh container chính */
        .container5 {
            max-width: 760px;
            /* Giảm chiều rộng tối đa một chút để gọn gàng hơn */
            margin: 40px auto;
            /* Thêm khoảng cách trên dưới */
            padding: 30px;
            /* Tăng padding */
            background-color: #ffffff;
            /* Nền trắng sạch */
            border-radius: 12px;
            /* Bo tròn góc nhiều hơn */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            /* Đổ bóng sâu hơn một chút */
            animation: fadeIn 0.8s ease-out;
            /* Thêm hiệu ứng fade in khi tải trang */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tiêu đề phần */
        .section-title {
            color: var(--primary-color);
            /* Sử dụng màu xanh chính */
            font-weight: 700;
            /* Đậm hơn */
            font-size: 26px;
            /* Kích thước lớn hơn */
            text-transform: uppercase;
            margin-bottom: 25px;
            /* Khoảng cách dưới tiêu đề */
            text-align: center;
            /* Căn giữa tiêu đề */
            letter-spacing: 0.5px;
            /* Tăng khoảng cách chữ */
        }

        /* Ghi chú và dấu sao bắt buộc */
        .note {
            font-size: 15px;
            color: var(--secondary-color);
            /* Màu xám cho ghi chú */
            margin-bottom: 25px;
            padding-left: 5px;
            /* Thêm padding nhỏ */
        }

        .required {
            color: var(--danger-color);
            /* Màu đỏ cho dấu sao */
            font-weight: bold;
        }

        /* Kiểu dáng cho label */
        label {
            font-weight: 600;
            margin-bottom: 8px;
            /* Tăng khoảng cách dưới label */
            display: block;
            color: var(--text-color);
        }

        /* Kiểu dáng cho input và select */
        select,
        input[type="text"],
        input[type="email"] {
            height: 48px;
            /* Chiều cao lớn hơn một chút */
            border-radius: 8px;
            /* Bo tròn nhiều hơn */
            border: 1px solid var(--border-color);
            /* Viền màu xám nhẹ */
            padding: 0 15px;
            /* Padding bên trong */
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động mượt mà */
            font-size: 16px;
            color: var(--text-color);
        }

        select:focus,
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: var(--primary-color);
            /* Viền màu xanh khi focus */
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Đổ bóng nhẹ khi focus */
            outline: none;
            /* Bỏ outline mặc định */
        }

        /* Điều chỉnh input group */
        .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group-text {
            background-color: var(--light-gray);
            /* Nền cho icon */
            border: 1px solid var(--border-color);
            border-left: 0;
            border-top-right-radius: 8px;
            /* Bo tròn góc cho icon */
            border-bottom-right-radius: 8px;
            color: var(--secondary-color);
            padding: 0 15px;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        /* Nút bấm */
        .btn {
            padding: 12px 30px;
            /* Tăng padding nút */
            font-size: 17px;
            font-weight: 600;
            border-radius: 8px;
            /* Bo tròn nút */
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động */
            cursor: pointer;
            border: none;
            /* Bỏ viền mặc định */
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover-color);
            transform: translateY(-2px);
            /* Hiệu ứng nhấc nhẹ nút */
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.2);
        }

        /* Căn chỉnh lại các nút trong div chứa nút */
        .mt-4.text-center {
            display: flex;
            justify-content: center;
            gap: 20px;
            /* Tăng khoảng cách giữa các nút */
            margin-top: 35px;
            /* Tăng khoảng cách trên */
        }

        /* custom.css */

        /* Khai báo biến CSS để dễ dàng quản lý màu sắc */
        :root {
            --primary-color: #007bff;
            /* Màu xanh chính */
            --primary-hover-color: #0056b3;
            /* Màu xanh khi hover */
            --secondary-color: #6c757d;
            /* Màu xám phụ */
            --text-color: #343a40;
            /* Màu chữ chính */
            --light-background-color: #f0f2f5;
            /* Màu nền nhẹ nhàng cho body */
            --container-background-color: #ffffff;
            /* Màu nền trắng cho container */
            --border-color: #dee2e6;
            /* Màu viền */
            --danger-color: #dc3545;
            /* Màu đỏ */
            --danger-hover-color: #bd2130;
            /* Màu đỏ khi hover */
        }

        /* Kiểu dáng chung cho body và font */
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            background-color: var(--light-background-color);
            /* Sử dụng màu nền nhẹ cho body */
            color: var(--text-color);
            /* Màu chữ mặc định */
            line-height: 1.6;
        }

        /* Điều chỉnh container chính */
        .container5 {
            max-width: 760px;
            margin: 40px auto;
            padding: 30px;
            background-color: var(--container-background-color);
            /* Đảm bảo container có nền trắng */
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-out;
        }

        /* địa chỉ */
        .address-selector {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: #fff;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .address-header {
            display: flex;
            align-items: center;
            padding: 0;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background-color: #fff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .address-header:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .address-header input {
            border: none;
            background-color: transparent;
            flex: 1;
            padding: 10px 12px;
            font-size: 15px;
            color: var(--text-color);
            outline: none;
        }

        .address-header input:focus {
            box-shadow: none;
        }

        .address-header button {
            background: none;
            border: none;
            color: var(--secondary-color);
            padding: 0 10px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Tab */
        .tab {
            padding: 10px;
            font-size: 14px;
            color: var(--text-color);
            background-color: #f8f9fa;
            border: none;
            border-bottom: 2px solid transparent;
        }

        .tab.active {
            font-weight: 600;
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            background-color: #fff;
        }

        /* Nội dung */
        .tab-content {
            max-height: 250px;
            overflow-y: auto;
            padding: 12px;
            background-color: #fff;
            border: 1px solid var(--border-color);
            border-top: none;
            border-radius: 0 0 8px 8px;
        }

        #searchInput {
            font-size: 14px;
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            margin-bottom: 10px;
        }

        /* Danh sách */
        .location-item {
            padding: 10px 12px;
            font-size: 14px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .location-item:hover {
            background-color: var(--light-background-color);
        }

        .location-item.selected {
            background-color: #e3f2fd;
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Địa chỉ đã chọn */
        .alert-info {
            font-size: 14px;
            padding: 10px 12px;
            background-color: #eaf4ff;
            border-color: #b6e0fe;
            color: #0d6efd;
            border-radius: 6px;
            margin-top: 10px;
        }



        /* ... (giữ nguyên các phần CSS còn lại bạn đã có) ... */
    </style>
</head>

<body>
    @include('header')

    <div class="container5 py-4">
        <h5 class="section-title">THÔNG TIN HÀNH KHÁCH</h5>
        <p class="note mb-2">
            Vui lòng điền đầy đủ thông tin, nhân viên sẽ liên lạc với khách hàng qua địa chỉ này để hoàn thành thủ tục đặt vé.
            <br><span class="required">*</span> Các trường bắt buộc phải nhập.
        </p>
        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label>Họ Và Tên <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="col-md-3">
                    <label>Giới tính</label>
                    <select class="form-select" name="gender">
                        <option value="Nam" {{ old('gender', Auth::user()->gender ?? '') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gender', Auth::user()->gender ?? '') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Mã Khách Hàng</label>
                    <input type="text" class="form-control fw-bold" value="{{ Auth::user()->phone_number }}" disabled>
                </div>

                <div class="col-md-6">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>

                <div class="col-md-3">
                    <label>Số Điện Thoại</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                </div>

                <div class="col-md-3">
                    <label>Ngày sinh</label>
                    <div class="input-group">
                        <!-- <input id="ngay_sinh" name="ngay_sinh" type="text" class="form-control" value="{{ Auth::user()->ngay_sinh }}"> -->
                        <input id="ngay_sinh" name="ngay_sinh" type="text" class="form-control"
                            value="{{ old('ngay_sinh', \Carbon\Carbon::parse(Auth::user()->ngay_sinh)->format('d-m-Y')) }}">
                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                    <label>Địa Chỉ Liên Hệ</label>
                    <input type="text" name="dia_chi" class="form-control" value="{{ Auth::user()->dia_chi }}">
                </div> -->

                <div class="col-md-12">
                    <label>Địa Chỉ Liên Hệ</label>
                    <div class="address-selector shadow-sm">
                        <!-- Header -->
                        <div class="address-header">
                            <input type="text" class="form-control border-0 bg-transparent" id="addressDisplay"
                                placeholder="Tỉnh/Thành phố, Phường/Xã" readonly />
                            <button type="button" class="btn btn-sm text-secondary" id="clearBtn" onclick="clearAddress()" style="display:none">✕</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleSelector()">
                                <span id="toggleIcon">▼</span>
                            </button>
                        </div>

                        <!-- Selector -->
                        <div id="addressSelector" style="display: none;">
                            <div class="d-flex border-bottom">
                                <button type="button" class="tab flex-fill btn btn-light border-0 rounded-0 active" id="provinceTab"
                                    onclick="showTab('province')">
                                    Tỉnh/Thành phố
                                </button>
                                <button type="button" class="tab flex-fill btn btn-light border-0 rounded-0" id="wardTab"
                                    onclick="showTab('ward')" disabled>
                                    Phường/Xã
                                </button>
                            </div>

                            <div class="tab-content p-2">
                                <!-- Search box -->
                                <div class="mb-2">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm..." onkeyup="filterLocations()" />
                                </div>

                                <!-- Location List -->
                                <div id="locationList" class="list-group small"></div>

                                <!-- Output -->
                                <input type="hidden" name="dia_chi_moi" id="addressInput" value="" />
                                <div class="alert alert-info mt-3 mb-0">
                                    <strong>Địa chỉ đã chọn:</strong> <span id="selectedAddress">Chưa chọn</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label>Số nhà / Tên đường</label>
                    <input type="text" name="street" id="street" class="form-control" placeholder="VD: 388 Nguyễn Văn Cừ">
                </div>

                <div class="col-md-12">
                    <label>Địa chỉ hiện tại</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->dia_chi }}" disabled>
                </div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary px-4">Cập nhật</button>

                {{-- Nút đăng xuất --}}
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <!-- <button type="submit" class="btn btn-danger px-4 ms-2">Đăng xuất</button> -->
                </form>
            </div>
        </form>

    </div>

    @include('footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>

    <script>
        flatpickr("#ngay_sinh", {
            dateFormat: "d-m-Y",
            locale: "vn" // sử dụng ngôn ngữ tiếng Việt
        });
    </script>

    <!-- địa chỉ -->
    <script>
        const addressData = {
            "an-giang": {
                name: "An Giang",
                wards: ["Xã An Phú", "Xã Khánh An", "Xã Vĩnh Bình", "Xã Vĩnh Hòa Hưng", "Xã Vĩnh Phong", "Xã Vĩnh Thuận"]
            },
            "can-tho": {
                name: "Cần Thơ",
                wards: ["Phường An Khánh", "Phường Ninh Kiều", "Phường Cái Khế"]
            },
            "vinh-long": {
                name: "Vĩnh Long",
                wards: ["Xã An Phước", "Xã Tân An Hội", "Xã Long Mỹ"]
            }
        };

        let currentTab = "province";
        let selectedProvince = null;
        let selectedWard = null;
        let isOpen = false;

        function toggleSelector() {
            isOpen = !isOpen;
            document.getElementById("addressSelector").style.display = isOpen ? "block" : "none";
            document.getElementById("toggleIcon").textContent = isOpen ? "▲" : "▼";
            if (isOpen) showTab("province");
        }

        function showTab(tab) {
            document.querySelectorAll(".tab").forEach((t) => t.classList.remove("active"));
            document.getElementById(tab + "Tab").classList.add("active");
            currentTab = tab;
            document.getElementById("searchInput").value = "";
            if (tab === "province") loadProvinces();
            else if (tab === "ward") loadWards();
        }

        function loadProvinces() {
            const list = document.getElementById("locationList");
            list.innerHTML = "";
            Object.entries(addressData).forEach(([code, data]) => {
                const item = createItem(data.name, () => selectProvince(code));
                if (selectedProvince === code) item.classList.add("selected");
                list.appendChild(item);
            });
        }

        function loadWards() {
            const list = document.getElementById("locationList");
            list.innerHTML = "";
            if (selectedProvince) {
                addressData[selectedProvince].wards.forEach((ward) => {
                    const item = createItem(ward, () => selectWard(ward));
                    if (selectedWard === ward) item.classList.add("selected");
                    list.appendChild(item);
                });
            }
        }

        function createItem(text, onClick) {
            const div = document.createElement("div");
            div.className = "list-group-item list-group-item-action location-item";
            div.textContent = text;
            div.onclick = onClick;
            return div;
        }

        function selectProvince(code) {
            selectedProvince = code;
            selectedWard = null;
            document.getElementById("wardTab").disabled = false;
            showTab("ward");
            updateDisplay();
        }

        function selectWard(name) {
            selectedWard = name;
            updateDisplay();
            toggleSelector();
        }

        function updateDisplay() {
            const addressParts = [];
            if (selectedWard) addressParts.push(selectedWard);
            if (selectedProvince && addressData[selectedProvince]) {
                addressParts.push(addressData[selectedProvince].name);
            }
            const full = addressParts.join(", ");
            document.getElementById("addressDisplay").value = full;
            document.getElementById("addressInput").value = full;
            document.getElementById("selectedAddress").textContent = full || "Chưa chọn";
            document.getElementById("clearBtn").style.display = full ? "inline" : "none";
        }


        function clearAddress() {
            selectedProvince = null;
            selectedWard = null;
            document.getElementById("wardTab").disabled = true;
            updateDisplay();
            if (isOpen) showTab("province");
        }

        function filterLocations() {
            const term = document.getElementById("searchInput").value.toLowerCase();
            document.querySelectorAll(".location-item").forEach((item) => {
                item.style.display = item.textContent.toLowerCase().includes(term) ? "block" : "none";
            });
        }

        window.onload = loadProvinces;
    </script>

</body>

</html>