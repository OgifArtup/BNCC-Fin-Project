<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerUser(UserRequest $request){
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor' => $request->nomor,
        ]);

        return redirect('/')->with('success', 'Account Successfully Made! Please Login');
    }
}
