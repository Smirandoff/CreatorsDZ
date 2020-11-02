<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Shows login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    /**
     * Submits login form request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|max:255',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin');
        }
        return redirect()->back()->withError('Le mot de passe que vous avez introduit ne corresponds pas a l\'adresse email');
    }
    /**
     * Shows forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('admin.auth.forgotPassword');
    }
    /**
     * Submits forgot password form request
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }
    /**
     * Shows the reset password form
     */
    public function showResetPasswordForm($token){
        return view('admin.auth.resetPassword', compact('token'));
    }
    /**
     * Submits the reset password form request
     */
    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $status = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );
    
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->withSuccess('Votre mot de passe a été réinitialisé avec succès, vous pouvez désormais vous connecter avec vos nouvels identifiants')
                    : back()->withErrors(['email' => __($status)]);
    }

    protected function broker(){
        return Password::broker('admins');
    }
}
