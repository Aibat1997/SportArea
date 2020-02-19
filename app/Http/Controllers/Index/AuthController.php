<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers;

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
        }else {
            return redirect()->back()->withErrors(['Введен неверный логин или пароль']);
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

    public function profileChange(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $result = Helpers::storeImg('avatar', 'avatar', $request);
        }else {
            $result = Auth::user()->avatar;
        }

        Auth::user()->update([
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'phone' => $request->phone,
            'avatar' => $result,
            'password' => $request->has('password') ? Hash::make($request->password) : Auth::user()->password,
        ]);

        return redirect()->back()->withErrors(['Успешно сохранено!']); 
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
