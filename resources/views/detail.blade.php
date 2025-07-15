@include('header')

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết chuyến xe - COSMO BUS</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .banner-section {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 60px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .banner-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23ffffff" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .flash-sale {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        
        .flash-sale .highlight {
            color: #ffc107;
            font-size: 3rem;
        }
        
        .trip-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .trip-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .price-tag {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545;
        }
        
        .seat-selection {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .legend-container {
            display: flex;
            gap: 40px;
            margin-bottom: 30px;
        }

        .legend-section {
            flex: 1;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .legend-box {
            width: 30px;
            height: 25px;
            border-radius: 8px;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .seat {
            width: 50px;
            height: 40px;
            margin: 4px;
            border-radius: 15px;
            border: 2px solid #ccc;
            display: inline-block;
            cursor: pointer;
            position: relative;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .seat.unavailable {
            background-color: #ccc;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .seat.single-small {
            border: 2px solid #dc3545;
        }

        .seat.available {
            border: 2px solid #d633ff;
        }

        .seat.selected {
            background-color: #32cd32;
            border-color: #32cd32;
        }

        .seat.selected::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .bus-layout {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
        }

        .floor-section {
            background: #e9ecef;
            border-radius: 15px;
            padding: 20px;
            width: 200px;
            border: 2px solid #666;
        }

        .floor-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .driver-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .steering-wheel {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #333;
            position: relative;
            margin: 0 auto;
        }

        .steering-wheel::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            border: 2px solid #333;
            border-radius: 50%;
        }

        .steering-wheel::after {
            content: '';
            position: absolute;
            width: 3px;
            height: 15px;
            background: #333;
            border-radius: 2px;
        }

        .seat-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .seat-row {
            display: flex;
            justify-content: center;
            gap: 6px;
        }

        .bottom-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 2px solid #000;
            margin-top: 20px;
        }

        .bottom-bar .total-text {
            font-weight: bold;
            font-style: italic;
            font-size: 18px;
        }

        .bottom-bar .continue-btn {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-style: italic;
            padding: 10px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .bottom-bar .continue-btn:hover {
            background-color: #0056b3;
        }

        .payment-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .payment-method {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color: #4285f4;
            transform: translateY(-2px);
        }

        .payment-method img {
            width: 50px;
            height: 30px;
            object-fit: contain;
        }

        .app-download {
            text-align: center;
        }

        .app-download .qr-code {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #666;
        }

        .app-download .store-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .app-download .store-buttons img {
            width: 140px;
            height: 45px;
        }

        .social-section {
            text-align: center;
            margin: 40px 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            text-decoration: none;
        }

        .social-links .facebook {
            background-color: #1877f2;
        }

        .social-links .youtube {
            background-color: #ff0000;
        }

        .social-links .tiktok {
            background-color: #000;
        }

    </style>
</head>
<body>
    <!-- Banner Section -->
    <div class="banner-section">
        <div class="container">
            <div class="flash-sale">
                <div style="color: #1976d2;">THỨ 3 - VÀ VUI THẢ GA</div>
                <div>
                    <span style="color: #ffc107; background: white; padding: 5px 15px; border-radius: 10px; margin-right: 10px;">Flash Sale</span>
                    <span style="color: #ffc107; background: white; padding: 5px 15px; border-radius: 10px;">Giảm Đến</span>
                    <span class="highlight">50%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <!-- Thông tin chuyến xe -->
        <div class="trip-card p-4">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=300&h=200&fit=crop" alt="Xe Limousine" class="trip-image">
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Cẩm Nhung Luxury</h5>
                    <p class="text-muted mb-2">Limousine 22 Phòng</p>
                    <p class="mb-2">🕐 23:30 • Bến xe trung tâm Cần Thơ</p>
                    <p class="mb-2">🕕 06:00 • Bến xe liên tỉnh Đà Lạt</p>
                    <p class="text-muted">Còn __ chỗ trống</p>
                </div>
                <div class="col-md-3 text-end">
                    <div class="price-tag">Từ 299.000đ</div>
                </div>
            </div>
        </div>

        <!-- chon cho ngoi -->
        <div class="seat-selection">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="text-success">ĐÓN TRẢ TẬN NƠI</h5>
                    <p class="text-muted">*Vé thuộc chuyến Cần Thơ - Đà Lạt (__/__/__)</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="fw-bold">KHÔNG CẦN THANH TOÁN TRƯỚC</p>
                </div>
            </div>

            <div class="legend-container">
               <!-- chu thich -->
                <div class="legend-section">
                    <div class="legend-item">
                        <div class="legend-box" style="background-color: #ccc; border: 2px solid #999;"></div>
                        <span>Ghế không bán</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #dc3545; background: white;"></div>
                        <span>Phòng đơn nhỏ 1 khách</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #d633ff; background: white;"></div>
                        <span>Phòng đôi 2 khách<br>Phòng đơn 1 khách</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-box" style="border: 2px solid #32cd32; background: #32cd32;"></div>
                        <span>Ghế đang chọn</span>
                    </div>
                </div>

                <!-- Bus layout -->
                <div class="bus-layout">
                    <!-- Tầng Dưới -->
                    <div class="floor-section">
                        <div class="floor-title">Tầng Dưới</div>
                        <div class="driver-section">
                            <div class="steering-wheel"></div>
                        </div>
                        <div class="seat-column">
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Tầng Trên -->
                    <div class="floor-section">
                        <div class="floor-title">Tầng Trên</div>
                        
                        <div class="seat-column">
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                            <div class="seat-row">
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                                <div class="seat available" onclick="toggleSeat(this)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="bottom-bar">
                <span class="total-text">Tổng cộng: <span id="totalPrice">0đ</span></span>
                <button class="continue-btn" onclick="continueBooking()">Tiếp tục</button>
            </div>
        </div>

        <!-- Payment Methods and App Download -->
        <div class="row">
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Phương thức thanh toán</h6>
                    <div class="payment-methods">
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1a73e8/ffffff?text=VISA" alt="Visa">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/eb001b/ffffff?text=MC" alt="MasterCard">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/005aa0/ffffff?text=JCB" alt="JCB">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/d60270/ffffff?text=Momo" alt="Momo">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/0068ff/ffffff?text=ZaloPay" alt="ZaloPay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff4444/ffffff?text=Shopee" alt="ShopeePay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff6600/ffffff?text=SPay" alt="SPayLater">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1ba0e2/ffffff?text=VNPAY" alt="VNPAY">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff0000/ffffff?text=Viettel" alt="Viettel">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/00a651/ffffff?text=Napas" alt="Napas">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/ff6600/ffffff?text=OnePay" alt="OnePay">
                        </div>
                        <div class="payment-method">
                            <img src="https://via.placeholder.com/50x30/1976d2/ffffff?text=SmartPay" alt="SmartPay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-section">
                    <h6 class="mb-3 fw-bold">Tải ứng dụng COSMO BUS</h6>
                    <div class="app-download">
                        <div class="qr-code">
                            📱 QR Code
                        </div>
                        <div class="store-buttons">
                            <img src="https://via.placeholder.com/140x45/000000/ffffff?text=App+Store" alt="App Store">
                            <img src="https://via.placeholder.com/140x45/000000/ffffff?text=Google+Play" alt="Google Play">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Links -->
        <div class="social-section">
            <h6 class="fw-bold">Kết nối với COSMO BUS</h6>
            <div class="social-links">
                <a href="#" class="social-icon facebook">f</a>
                <a href="#" class="social-icon youtube">▶</a>
                <a href="#" class="social-icon tiktok">♪</a>
            </div>
        </div>
    </div>

   @include('footer')

    <script>
        const seatPrice = 299000;

        function toggleSeat(seatElement) {
            if (seatElement.classList.contains('unavailable')) {
                return;
            }
            
            if (seatElement.classList.contains('selected')) {
                seatElement.classList.remove('selected');
                seatElement.classList.add('available');
            } else if (seatElement.classList.contains('available')) {
                seatElement.classList.remove('available');
                seatElement.classList.add('selected');
            }
            updateTotalPrice();
        }

        function updateTotalPrice() {
            const selectedSeatsCount = document.querySelectorAll('.seat.selected').length;
            const total = selectedSeatsCount * seatPrice;
            document.getElementById('totalPrice').textContent = total.toLocaleString('vi-VN') + 'đ';
        }

        function continueBooking() {
            const selectedSeatsCount = document.querySelectorAll('.seat.selected').length;
            if (selectedSeatsCount === 0) {
                alert('Vui lòng chọn ít nhất một ghế!');
                return;
            }
            alert(`Bạn đã chọn ${selectedSeatsCount} ghế. Tổng tiền: ${(selectedSeatsCount * seatPrice).toLocaleString('vi-VN')}đ`);
        }

        // Initialize some seats as unavailable for demo
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            // Make some random seats unavailable
            const unavailableIndices = [2, 7, 12, 15, 18];
            unavailableIndices.forEach(index => {
                if (seats[index]) {
                    seats[index].classList.remove('available');
                    seats[index].classList.add('unavailable');
                    seats[index].onclick = null;
                }
            });
        });
    </script>
</body>
</html>