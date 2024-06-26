<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewLogin(): View
    {
        return view('admin.auth.login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(LoginRequest $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            return redirect(route('admin.cinemas'))->with('success', 'Đăng nhập thành công');
        }
        return back()->with('error', 'Tài Khoản mật khẩu không đúng');
    }

    public function viewRegister(): View
    {
        return view('admin.auth.register.index');
    }

    public function register(RegisterRequest $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            return back()->with('error', 'Email đã tồn tại');
        }

        User::create([
            'email' => $email,
            'password' => $request->password,
            'role_id' => 1,
        ]);
        return redirect(route('admin.view_login'))->with('success', 'Đăng ký tài khoản thành công');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
