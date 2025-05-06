<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        $data = [
            'title' => 'Đăng nhập',
            'content' => 'Đăng nhập',
        ];
        return view('auth.login', $data);
    }

    public function showRegister()
    {
        $data = [
            'title' => 'Đăng ký',
            'content' => 'Đăng ký',
        ];
        return view('auth.register', $data);
    }

    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->status === 'inactive') {
                Auth::logout();
                return redirect()->route('auth.login.page')->with('error', 'Tài khoản của bạn đã bị khóa.');
            }
            return redirect()->route('home.page')->with('success', 'Đăng nhập thành công.');
        }
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
    }
    public function register(AuthRequest $request) {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login.page')->with('just_logged_out', true);
    }
}
