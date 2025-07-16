<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Đường dẫn đến Controller của bạn
use App\Http\Controllers\UserController;


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

