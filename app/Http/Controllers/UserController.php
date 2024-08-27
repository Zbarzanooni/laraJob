<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
  public function index()
  {
      return view('layouts.app');
  }
  public function createSeeker()
  {
      return view('user.register-seeker');
  }
  public function storeSeeker(UserRegistrationRequest $request)
  {
    $user = User::create([
        'name'     => request('name'),
        'email'    => request('email'),
        'password' => bcrypt(request('password')),
        'user_type'=> self::JOB_SEEKER
        ]);
      $user->sendEmailVerificationNotification();
      return redirect()->route('login')->with('sucsessMesage', 'تبریک عضو ما شدی :)');
  }
    public function createEmployer()
    {
        return view('user.register-empoyer');
    }
    public function storeEmployer(UserRegistrationRequest $request)
    {
       $user = User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => bcrypt(request('password')),
            'user_type'=> self::JOB_SEEKER
        ]);
       $user->sendEmailVerificationNotification();
       return redirect()->route('login')->whit('sucsessMesage', 'تبریک عضو ما شدی :)');
    }

    public function login()
    {
      return view('user.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    =>['required'],
            'password' =>['required']
        ]);
        $info = $request->only('email', 'password');
        if (Auth::attempt($info))
        {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('errorMessage', 'یه اشتباهی شده دوباره وارد شو');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'کاربر با موفقیت خارج شد.');
    }

    public function ProfileSeeker(){

      return view('profile.profileSeeker');
    }
    public function UpdateProfileSeeker(Request $request)
    {
        if ($request->has('profile_pic')){
            $imgPath = $request->file('profile_pic')->store('image', 'public');
            \auth()->user()->update(['profile_pic'=>$imgPath]);
        }
        \auth()->user()->update($request->except('profile_pic'));
        return back();
    }
}
