<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Đường dẫn đến Controller của bạn



// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/search/{type}', ['as' => 'search.transport', 'uses' => 'SearchController@transport'])->name('search.transport');
Route::get('/search-result', ['as' => 'search.result', 'uses' => 'SearchController@result'])->name('search.result');
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
