<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\userBookingController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ReportController;



// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search/{type}', ['as' => 'search.transport', 'uses' => 'SearchController@transport'])->name('search.transport');
Route::get('/search-result', ['as' => 'search.result', 'uses' => 'SearchController@result'])->name('search.result');

Route::get('/', [HomeController::class, 'index'])->name('home');

// user-login
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('login.user');
Route::post('/user/login', [UserController::class, 'login']);

// user-register
Route::get('/user/register', [UserController::class, 'showRegisterForm'])->name('register.user');
Route::post('/user/register', [UserController::class, 'register']);

//Thêm route logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
})->name('logout');

// trang ds đơn hàng
Route::get('/history', function () {
    return view('user.history');
})->name('history');

// thong tin - info
Route::get('/info', function () {
    return view('user.info');
})->middleware('auth')->name('info');

//cập nhật thông tin - info
Route::middleware(['auth'])->group(function () {
    Route::post('/cap-nhat-tai-khoan', [UserController::class, 'update'])->name('account.update');
});


Route::post('/info', [UserController::class, 'store'])->name('info.store');

//thanh toán
/*Route::get('/payment', function () {
    return view('payment');
})->name('payment');*/

//list đặt xe
Route::get('/danhsachchuyen', [ListController::class, 'index'])->name('list');
//chi tiết 
Route::get('/danhsachchuyen/{id}', [DetailController::class, 'show'])->name('detail');
// Xử lý đặt vé
Route::post('/danhsachchuyen/{id}/book', [DetailController::class, 'book'])->name('detail.book');
// Trang thông tin đặt vé (offline)
Route::get('/booking/{booking}/payment-offline', [userBookingController::class, 'paymentOffline'])->name('payment.offline');
// Xác nhận đặt vé offline
Route::post('/booking/{booking}/confirm', [userBookingController::class, 'confirmBooking'])->name('booking.confirm');
// Trang thanh toán online
Route::get('/booking/{booking}/payment', [userBookingController::class, 'payment'])->name('booking.payment');
// Xử lý thanh toán
Route::post('/booking/{booking}/process-payment', [userBookingController::class, 'processPayment'])->name('booking.process.payment');


//Trang admin
Route::prefix('admin')->name('admin.')->group(function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //Routes
    Route::resource('routes', RouteController::class);
    Route::post('routes/{route}/toggle-status', [RouteController::class, 'toggleStatus'])->name('routes.toggle-status');
    //Buses
    Route::resource('buses', BusController::class);
    Route::post('buses/{bus}/toggle-status', [BusController::class, 'toggleStatus'])->name('buses.toggle-status');
    //Seats lỗi đang sửa
    Route::post('/seats', [SeatController::class, 'store'])->name('seats.store');
    Route::get('/seats/{seat}/edit', [SeatController::class, 'edit'])->name('seats.edit');
    Route::put('/seats/{seat}', [SeatController::class, 'update'])->name('seats.update');
    Route::delete('/seats/{seat}', [SeatController::class, 'destroy'])->name('seats.destroy');
    //Schedules
    Route::resource('schedules', ScheduleController::class);
    Route::post('schedules/{schedule}/toggle-status', [ScheduleController::class, 'toggleStatus'])->name('schedules.toggle-status');
    //booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{booking}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/admin/booking/{booking}/update-status', [BookingController::class, 'updateStatus'])->name('booking.update-status');
    //Reports
    Route::get('/reports/revenue', [ReportController::class, 'revenue'])->name('reports.revenue');
    Route::get('/reports/trips', [ReportController::class, 'trips'])->name('reports.trips');
});

Route::get('/ttmco2024', function () {
    return view('ttmco2024');
})->name('ttmco2024');

Route::get('/ttmcovn2025', function () {
    return view('ttmcovn2025');
})->name('ttmcovn2025');




