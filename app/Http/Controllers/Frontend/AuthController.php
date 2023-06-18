<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\LoginRequest;
use App\Http\Requests\Frontend\RegisterRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }

    public function showRegister()
    {
        return view('frontend.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        //    register user use guard('users')
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::guard('users')->loginUsingId($user->id);
        return redirect()->route('home');
    }

    public function login(LoginRequest $request)
    {
        // login users use guard('users')
        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // add session auth guard('users') login
            Auth::guard('users')->login(Auth::guard('users')->user());
            return redirect()->route('home')->with('success', 'Berhasil login');
        }
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        // logout users use guard('users')
        Auth::guard('users')->logout();
        return redirect()->route('home');
    }
}
