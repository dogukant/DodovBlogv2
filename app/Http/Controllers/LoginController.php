<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        User::all()->first();
        return view('back.login');
    }

    public function logingiris(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->route('admin.index')->with('success', 'Başarıyla giriş yaptınız.');
        } else {
            return redirect()->back();
        };
        return view('back.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
