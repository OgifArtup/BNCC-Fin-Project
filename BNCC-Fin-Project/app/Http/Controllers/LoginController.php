<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|regex:[gmail.com$]',
            'password' => 'required|string',
        ]);

        if (User::where('email', '=', $request->email)->exists()) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/view-barang');
            }
        }
        else if (Admin::where('email', '=', $request->email)->exists()) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/list-barang');
            }
        }

        
        return back()->with('errorLogin', 'Email or Password is invalid');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
