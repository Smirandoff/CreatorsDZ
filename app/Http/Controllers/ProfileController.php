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
        return view('profile.edit')->with(compact('user'));
    }
    public function update(User $user, Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|numeric',
            'bank' => 'nullable|string|max:255',
            'rib' => 'nullable|string|size:10',
            'address' => 'nullable|string|max:255',
        ]);
        $data = $request->validated();
        $user->update($data);
        return redirect()->back()->withSuccess('La modification de votre profil a été effectuée avec succès !');
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
            return response()->json([
                'message' => 'Votre mot de passe a été modifié avec succès',
            ], 200);
        }else {
            return response()->json([
                'errors' => [
                    'old_password'=> [
                        'Votre ancien mot de passe est incorrecte !'
                    ],
                ],
            ], 422);
        }
    }
    public function updateProfilePhoto(User $user, Request $request){
        $request->validate([
            'profile_photo_url' => 'required|image|max:4096|dimensions:width=170,height=170',
        ]);
        $profile_photo_url = $this->processImage($request->profile_photo_url);
        $user->profile_photo_url = $profile_photo_url;
        $user->save();
        return response()->json([
            'message' => 'Votre photo de profil a correctement été mise à jour',
            'new_photo_url' => $user->profile_photo,
        ], 200);
    }
}
