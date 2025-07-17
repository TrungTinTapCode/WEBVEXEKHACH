<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Thêm logic đăng nhập ở đây
    }

    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Thêm logic đăng ký ở đây
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Trang cá nhân
    public function profile()
    {
        return view('auth.profile');
    }
}
