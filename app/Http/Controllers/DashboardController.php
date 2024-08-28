<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
  public function UpdateNewPassword(Request $request)
  {

      $this->validate($request, [
          'current_password' => 'required|string',
          'new_password' => 'required|confirmed|min:8|string'
      ]);
      $auth = Auth::user();

      // The passwords matches
      if (!Hash::check($request->get('current_password'), $auth->password))
      {
          return back()->with('error', "Current Password is Invalid");
      }

      if (strcmp($request->get('current_password'), $request->new_password) == 0)
      {
          return redirect()->back()->with("error", "New Password cannot be same as your current password.");
      }

      $user =  User::find($auth->id);
      $user->password =  Hash::make($request->new_password);
      $user->save();
      return Response::json()->with('success', "Password Changed Successfully");
  }

  public function UploadResume(Request $request)
  {
      $this->validate($request,[
          'resume' => 'required'
      ]);
      if ($request->has('resume')){
          $resomePath = $request->file('resume')->store('resume', 'public');
          \auth()->user()->update(['resume'=>$resomePath]);
          return back()->with('success', "Successfully");
      }

      return back()->with('error', "oooooops!");
  }

}
