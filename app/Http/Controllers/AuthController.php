<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Người dùng không tồn tại',
            ]);
        } else {
            return back()->withErrors([
                'password' => 'Email hoặc Mật khẩu không chính xác.',
            ]);
        }
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $existingUser = User::where('name', $request->input('name'))->first();

        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Tên người dùng đã tồn tại. Vui lòng chọn tên khác.']);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->usertype = 'user';

        if ($request->input('password') !== $request->input('password_confirmation')) {
            return redirect()->back()->withInput()->withErrors(['password_confirmation' => 'Mật khẩu xác nhận không khớp.']);
        }
        
        $user->save();

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
