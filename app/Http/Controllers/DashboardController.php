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

}
