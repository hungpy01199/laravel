<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function login() {
        return view('auth.login');

    }

    public function handleLogin(Request $request) {
        if(Auth::guard('webadmin')->attempt($request->only('username_login', 'password'))) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Invalid'); 
    }

    public function logout() {
        Auth::guard('webadmin')->logout();
        return redirect()->route('login');
    }
}
