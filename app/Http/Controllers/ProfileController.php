<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profile()
    {
        $user = auth()->user();

        if (!$user->wallet) {
            $user->wallet()->create(['balance' => 0]);
        }

        $wallet = $user->wallet;
        $transactions = $wallet->transactions() ? $wallet->transactions()->latest()->get(): [];

        return view('profile.profile', compact('wallet', 'transactions'));
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
