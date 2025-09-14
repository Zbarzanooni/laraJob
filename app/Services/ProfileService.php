<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    public function UpdateProfile(User $user, array $data)
    {
        if (isset($data['profile_pic'])){
            if ($user->profile_pic){
                Storage::disk('public')->delete($user->profile_pic);
            }
            $user->profile_pic = $data['profile_pic']->store('image', 'public');
        }
        $user->update($data->except('profile_pic'));
        return ['success' => true, 'message' => 'Password updated'];

    }
    public function updatePassword(User $user,string $currentPassword, string $newPassword )
    {

        if (!Hash::check($currentPassword, $user->password)) {
            return ['error' => "Current Password is Invalid"];
        }

        if (strcmp($currentPassword, $newPassword) == 0) {
            return ["error" => "New Password cannot be same as your current password."];
        }

        $user->password =  Hash::make($newPassword);
        $user->save();

        return ['success' => 'Password Changed Successfully'];
    }

    public function uploadResume(User $user, $resume)
    {

        if (!$resume) {
            return ['error' => 'Resume is required!'];
        }
        if ($user->resume) {
            Storage::disk('public')->delete($user->resume);
        }
        $user->resume = $resume->store('resume', 'public');
        $user->save();

        return ['success' => 'Resume uploaded successfully'];
    }
}
