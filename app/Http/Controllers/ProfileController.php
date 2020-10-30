<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user){
        return view('profile.index')->with(compact('user'));
    }
    public function edit(User $user){
        return view('profile.index')->with(compact('user'));
    }
    public function update(User $user, Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('profile.index', $user)->withSuccess('La modification de votre profil a été effectuée avec succès !');
    }
}
