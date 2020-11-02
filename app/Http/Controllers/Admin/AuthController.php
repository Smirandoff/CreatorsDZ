<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|max:255'
            ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin');
        }
        return redirect()->back()->withError('Le mot de passe que vous avez introduit ne corresponds pas a l\'adresse email');
    }
}
