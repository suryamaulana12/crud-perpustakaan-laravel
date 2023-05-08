<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        
        return view('login');
    }

    public function loginUser(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/');
        }
        return redirect('login')->with('error', 'password atau email anda salah!');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        $this->validate($request,[
            'email' => 'email|unique:users,email',
        ],[
            'email.unique' => 'email sudah terdaftar, coba cari yang lain!'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
       ]);

       return redirect('/login')->with('success', 'Anda berhasil melakukan register!');
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Anda telah logout!');
    }
    
}
