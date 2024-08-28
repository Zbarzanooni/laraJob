<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
   return view('user.dashboard');
  }

  public function verify()
  {
      return  view('user.verify');
  }

  public function resend()
  {
      $user = auth()->user();
      if ($user->hasVerifiedEmail()){
          return redirect()->route('dashboard');
      }
      $user->sendEmailVerificationNotification();
  }
  public function profile()
  {
      return view('profile.profile');
  }

  public function UpdateProfile(Request $request)
  {
      if ($request->has('profile_pic')){
          $imgPath = $request->file('profile_pic')->store('image', 'public');
          \auth()->user()->update(['profile_pic'=>$imgPath]);
      }
      \auth()->user()->update($request->except('profile_pic'));
      return back();
  }

}
