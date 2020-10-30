<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Traits\ImageProcessor;

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
}
