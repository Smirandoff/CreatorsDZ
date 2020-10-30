<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Traits\ImageProcessor;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageProcessor;
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
            'profile_photo_url' => 'nullable|image|max:4096'
        ]);
        $data = $request->except(['profile_photo_url']);
        if($request->file('profile_photo_url')){
            $profile_photo_url = $this->processImage($request->profile_photo_url);
            if($profile_photo_url){
                $data['profile_photo_url'] = $profile_photo_url;
            }
        }
        $user->update($data);
        return redirect()->route('profile.index', $user)->withSuccess('La modification de votre profil a été effectuée avec succès !');
    }
    public function editPassword(User $user){
        return view('profile.editPassword')->with(compact('user'));
    }
    public function updatePassword(User $user, Request $request){
        $request->validate([
            'old_password' => 'required|string|max:255',
            'password' => 'required|string|max:255|confirmed',
        ]);
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('profile.index', $user)->withSuccess('Votre mot de passe a été modifié avec succès');
        }else {
            return redirect()->back()->withError('Votre ancien mot de passe est incorrecte !');
        }
    }
}
