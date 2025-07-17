<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Đường dẫn đến Controller của bạn
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\ScheduleController;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/search/{type}', ['as' => 'search.transport', 'uses' => 'SearchController@transport'])->name('search.transport');
Route::get('/search-result', ['as' => 'search.result', 'uses' => 'SearchController@result'])->name('search.result');
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');


// user-login
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('login.user');
Route::post('/user/login', [UserController::class, 'login']);

// user-register
Route::get('/user/register', [UserController::class, 'showRegisterForm'])->name('register.user');
Route::post('/user/register', [UserController::class, 'register']);


//trang đặt xe
Route::get('/detail', function () {
    return view('detail');
})->name('detail');

//trang ds đơn hàng
Route::get('/history', function () {
    return view('user.history');
})->name('history');

//thong tin - info
Route::get('/info', function () {
    return view('user.info');
})->name('info');

Route::post('/info', [UserController::class, 'store'])->name('info.store');

//Trang admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('routes', RouteController::class);
    Route::post('routes/{route}/toggle-status', [RouteController::class, 'toggleStatus'])->name('routes.toggle-status');

    Route::resource('buses', BusController::class);
    Route::post('buses/{bus}/toggle-status', [BusController::class, 'toggleStatus'])->name('buses.toggle-status');

    Route::resource('schedules', ScheduleController::class);
    Route::post('schedules/{schedule}/toggle-status', [ScheduleController::class, 'toggleStatus'])->name('schedules.toggle-status');

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
});




Route::get('/ttmco2024', function () {
    return view('ttmco2024');
});

Route::get('/ttmcovn2025', function () {
    return view('ttmcovn2025');
});



