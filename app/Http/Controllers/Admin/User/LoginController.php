<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống quản trị'
        ]);
}
    public function store(Request $request)
    {

        $remember = $request->has('remember') ? true : false;

        // Xử lý logic đăng nhập
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            // Đăng nhập thành công
            $request->session()->regenerate();

            // Chuyển hướng đến trang chính của admin
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        // Đăng nhập thất bại
        return redirect()->back();
    }

}
