<?php
namespace App\Http\Repositories;

use App\Models\User;
use App\Traits\ImageProcessor;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    use ImageProcessor;
    public function updateProfile(User $user, array $data)
    {
        $user->update($data);
    }
    public function updatePassword(User $user, string $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
    public function updateProfilePhoto(User $user, string $url)
    {
        $profile_photo_url = $this->processImage($url);
        $user->profile_photo_url = $profile_photo_url;
        $user->save();
    }

}
