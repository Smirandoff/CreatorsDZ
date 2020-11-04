<?php
namespace App\Http\Repositories;

use App\Models\User;
use App\Traits\ImageProcessor;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    use ImageProcessor;

    /**
     * Updates user's main informations
     */
    public function updateProfile(User $user, array $data)
    {
        $user->update($data);
    }

    /**
     * Updates user's password
     */
    public function updatePassword(User $user, string $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
    /**
     * Update user's profile photo
     */
    public function updateProfilePhoto(User $user, string $url)
    {
        $profile_photo_url = $this->processImage($url);
        $user->profile_photo_url = $profile_photo_url;
        $user->save();
    }

}
