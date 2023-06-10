<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('admins.auth.login');
    }

    public function authenticate(AuthRequest $request)
    {
        if (Auth::guard('web')->attempt($request->validated(), $request->remember)) {
            if (Auth::guard('web')->user()->active) {
                return  redirect()->intended('/admin/dashboard');
            } else {
                Auth::guard('web')->logout();
                return back()->with(['warning' => 'Maaf akun tidak aktif / diblokir, silakan hubungi administrator !!'])->withInput($request->only('username'));
            }
        } else {
            return back()->with(['warning' => 'Maaf username atau password tidak sesuai'])->withInput($request->only('username'));
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return  redirect('/');
    }
}
