<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('user.login_user');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'password' => 'required',
        ]);

        $account = Account::where('phone_number', $request->phone_number)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            // Đăng nhập thành công (nếu muốn dùng Auth::login)
            Auth::login($account);
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['phone_number' => 'Số điện thoại hoặc mật khẩu không đúng!']);
    }

    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('user.register_user');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric|unique:account,phone_number',
            'password' => 'required|min:6|confirmed',
        ]);

        Account::create([
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.user')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
