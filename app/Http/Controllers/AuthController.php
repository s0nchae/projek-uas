<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // regenerate session
            $request->session()->regenerate();

            // CEK ROLE ADMIN
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/');
            }

            // kalau user biasa (kalau ada)
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ])->onlyInput('email');
    }

    // public function proseslogin(Request $request)
    // {
    //     $credentials = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
        
    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();

    //         if(Auth::user()->role !== 'admin'){
    //             Auth::logout();
    //             return back()->withErrors([
    //                 'email' => 'You dont have an access as admin!'
    //             ]);
    //         }

    //         return redirect()-> intended('/');
    //     }
    //     return back()->withErrors([
    //         'email' => 'The email or password you entered is incorrect!'
    //     ])->onlyInput('email');
    //     // return redirect()->route('login')->with('error', 'Email atau Password Salah');
    // }

    public function showRegister()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/login')->with('success', 'Akun berhasil dibuat dan Anda telah masuk.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
