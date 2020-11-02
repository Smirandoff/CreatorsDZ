<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendWarningNotification;
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
    public function show(User $user){
        return view('admin.users.show')->compact('user');
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
        return redirect()->back()->withSuccess('L\'utilisateur a correctement été bannis !');
    }
    public function unbanUser(User $user){
        $user->unban();
        return redirect()->back()->withSuccess('L\'utilisateur peut désormais accéder à son compte !');
    }
    public function sendWarningToUser(User $user, Request $request){
        $request->validate([
            'message' => 'required|string|max:255'
        ]);
        $user->notify(new SendWarningNotification($request->message));
        return redirect()->back()->withSuccess('Votre avertissement a été enregistré avec succès !');
    }

}
