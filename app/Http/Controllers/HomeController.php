<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route; // ← THÊM DÒNG NÀY

class HomeController extends Controller
{
    public function index()
    {
        $routes = Route::all(); // Lấy tất cả tuyến
        return view('home', compact('routes'));
    }
}
