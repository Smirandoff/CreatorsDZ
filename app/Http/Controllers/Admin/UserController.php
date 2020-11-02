<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        /**
         @TODO filter users
         */
        $users = User::get();
        return view('admin.users.index');
    }
    public function banUser(Request $request, User $user){
        $request->validate([
            'expired_at' => 'required_without:is_permanent|date|after:today',
            'comment' => 'required|string|max:255'
        ]);
        $data = $request->only('comment');
        if($request->expired_at){
            $data['expired_at'] = $request->expired_at;
        }
        $user->ban($data);
        return redirect()->back()->withSuccess('L\'utilisateur a correctement été bannis');
    }
    public function unbanUser(User $user){
        $user->unban();
        return redirect()->back()->withSuccess('L\'utilisateur peux désormais accéder à son compte');
    }
}
