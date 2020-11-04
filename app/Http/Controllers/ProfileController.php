<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProfileRepository;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfilePhotoRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;


class ProfileController extends Controller
{
    public function __construct(ProfileRepository $repository){
        $this->repository = $repository;
    }

    /**
     * Shows profile informations editing form
     */
    public function edit(User $user){
        return view('profile.edit')->with(compact('user'));
    }

    /**
     * Submits user's main informations update request
     */
    public function update(User $user, UpdateUserProfileRequest $request){
        $this->repository->updateProfile($user, $request->validated());
        return redirect()->back()->withSuccess('La modification de votre profil a été effectuée avec succès !');
    }

    /**
     * Submits user's password update request
     */
    public function updatePassword(User $user, UpdatePasswordRequest $request){
        $this->repository->updatePassword($user, $request->password);
        return response()->json([
            'message' => 'Votre mot de passe a été modifié avec succès',
        ], 200);
    }
    /**
     * Submit user's profile photo update request
     */
    public function updateProfilePhoto(User $user, UpdateProfilePhotoRequest $request){
        $this->repository->updateProfilePhoto($user, $request->profile_photo_url);
        return response()->json([
            'message' => 'Votre photo de profil a correctement été mise à jour',
            'new_photo_url' => $user->profile_photo,
        ], 200);
    }
}
