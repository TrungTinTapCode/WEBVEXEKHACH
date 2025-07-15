<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login_user');
    }

    //login
    public function login(Request $request)
    {
        // Ví dụ kiểm tra số điện thoại (có thể thêm validate)
        $request->validate([
            'phone' => 'required|numeric',
        ]);

        // Thực hiện xử lý đăng nhập ở đây (ví dụ tạm thời return lại phone)
        return back()->with('success', 'Đăng nhập thành công với số: ' . $request->phone);
    }

    //register
    public function showRegisterForm()
    {
        return view('user.register_user');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users,phone', // Nếu có bảng users
            'password' => 'required|min:6',
        ]);

        // Nếu bạn đã có model User
        // User::create([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'password' => bcrypt($request->password),
        // ]);

        // Tạm thời chỉ trả thông báo
        return redirect()->route('login.user')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
