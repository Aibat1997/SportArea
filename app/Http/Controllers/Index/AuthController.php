<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_firstname' => 'required|string',
            'phone' => 'required|string|unique:users'
        ]);

        $sms_code = mt_rand(10000, 99999);

        User::create([
            'user_firstname' => $request->user_firstname,
            'phone' => $request->phone,
            'user_role_id' => 2,
            'password' => Hash::make($sms_code)
        ]);

        return $sms_code;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/profile');
        }     
    }

    public function loginPage()
    {
       return view('index.login');    
    }

    public function profile()
    {
       return view('index.profile');    
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
