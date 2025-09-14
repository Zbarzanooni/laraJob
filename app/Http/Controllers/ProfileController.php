<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function updateProfile(Request $request)
    {
        $result = $this->profileService->updateProfile(auth()->user(), $request->all());

        return back()->with($result);
    }
    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        $result =  $this->profileService->updatePassword(auth()->user(),$data['current_password'], $data['new_password']);

        return back()->with($result);
    }

    public function uploadResume(Request $request)
    {
        $result =$this->profileService->uploadResume(auth()->user(),$request->file('resume'));

        return back()->with($result);
    }
}
