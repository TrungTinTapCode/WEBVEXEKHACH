<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'phone_number' => ['required', 'numeric', 'regex:/^0\d{9}$/'],
            'password'     => 'required',
        ], [
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.numeric'  => 'Số điện thoại không hợp lệ.',
            'phone_number.regex'    => 'Số điện thoại phải gồm 10 chữ số và bắt đầu bằng số 0.',
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
            'phone_number' => ['required', 'numeric', 'regex:/^0\d{9}$/', 'unique:account,phone_number'],
            'password'     => 'required|min:6|confirmed',
        ], [
            'name.required'         => 'Vui lòng nhập họ và tên.',
            'name.string'           => 'Họ và tên phải là chữ.',
            'name.max'              => 'Họ và tên không được quá 100 ký tự.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.numeric'  => 'Số điện thoại không hợp lệ.',
            'phone_number.regex'    => 'Số điện thoại phải gồm 10 chữ số',
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

        // Tạo dữ liệu cho bảng customers

        Customer::firstOrCreate(
            ['phone_number' => $request->phone_number],
            [
                'full_name' => $request->name,
            ]
        );

        return redirect()->route('login.user')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Cập nhật thông tin tài khoản
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'name'         => 'required|string|max:255',
    //         'ngay_sinh'    => 'nullable|date',
    //         'dia_chi'      => 'nullable|string|max:255',
    //         'email'        => 'nullable|email|max:255',
    //         'phone_number' => 'nullable|string|max:20',
    //         'gender'       => 'nullable|string|max:10',
    //     ]);

    //     /** @var \App\Models\Account $user */
    //     $user = Auth::user();
    //     $user->refresh(); // Cập nhật lại bản ghi từ database

    //     $user->name         = $request->name;
    //     $user->ngay_sinh    = \Carbon\Carbon::createFromFormat('d-m-Y', $request->ngay_sinh)->format('Y-m-d');
    //     $user->dia_chi      = $request->dia_chi;
    //     $user->email        = $request->email;
    //     $user->phone_number = $request->phone_number;
    //     $user->gender       = $request->gender;
    //     $user->save();

    //     return back()->with('success', 'Thông tin đã được cập nhật!');
    // }
    // Cập nhật thông tin tài khoản
    public function update(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'ngay_sinh'    => 'nullable|date',
            'street'       => 'nullable|string|max:255',
            'dia_chi'      => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'gender'       => 'nullable|string|max:10',
        ]);

        /** @var \App\Models\Account $user */
        $user = Auth::user();
        $user->refresh(); // Cập nhật lại bản ghi từ database

        $user->name         = $request->name;

        if ($request->filled('ngay_sinh')) {
            $user->ngay_sinh = Carbon::createFromFormat('d-m-Y', $request->ngay_sinh)->format('Y-m-d');
        }

        // Ghép địa chỉ đầy đủ
        $parts = [];

        if ($request->filled('street')) {
            $parts[] = trim($request->street);
        }

        if ($request->filled('dia_chi_moi')) {
            $parts[] = trim($request->dia_chi_moi);
        }

        if (!empty($parts)) {
            // Chỉ cập nhật nếu có dữ liệu địa chỉ mới
            $user->dia_chi = implode(', ', $parts);
        }


        $user->email        = $request->email;
        $user->phone_number = $request->phone_number;
        $user->gender       = $request->gender;
        $user->save();
        // Cập nhật thông tin khách hàng
        
        $customer = $user->customer;
        $customer->full_name = $request->name;
        $customer->email     = $request->email;
        $customer->phone_number = $request->phone_number;
        // $customer->gender    = $request->gender;
        $customer->save();

        return back()->with('success', 'Thông tin đã được cập nhật!');
    }
}