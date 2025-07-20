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
            'password'     => 'required',
        ], [
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.numeric'  => 'Số điện thoại không hợp lệ.',
            'password.required'     => 'Vui lòng nhập mật khẩu.',
        ]);

        $account = Account::where('phone_number', $request->phone_number)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            Auth::guard('web')->login($account);
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'phone_number' => 'Số điện thoại hoặc mật khẩu không đúng.',
        ])->withInput();
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
            'name'         => 'required|string|max:100',
            'phone_number' => 'required|numeric|unique:account,phone_number',
            'password'     => 'required|min:6|confirmed',
        ], [
            'name.required'         => 'Vui lòng nhập họ và tên.',
            'name.string'           => 'Họ và tên phải là chữ.',
            'name.max'              => 'Họ và tên không được quá 100 ký tự.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.numeric'  => 'Số điện thoại không hợp lệ.',
            'phone_number.unique'   => 'Số điện thoại đã được sử dụng.',
            'password.required'     => 'Vui lòng nhập mật khẩu.',
            'password.min'          => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed'    => 'Xác nhận mật khẩu không khớp.',
        ]);

        Account::create([
            'name'         => $request->name,
            'phone_number' => $request->phone_number,
            'password'     => Hash::make($request->password),
        ]);

        return redirect()->route('login.user')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
