<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
      $result = $this->userService->RegisterUser('seeker');
      if (!$result){
          return redirect()->route($result->route);
      }
      return redirect()->route($result->route);
  }
    public function createEmployer()
    {
        return view('user.register-empoyer');
    }
    public function storeEmployer(UserRegistrationRequest $request)
    {
      $result = $this->userService->RegisterUser('employer');
      if (!$result){
          return redirect()->route($result->route);
      }
        return redirect()->route($result->route);
    }

    public function login()
    {
      return view('user.login');
    }
    public function postLogin(LoginUserRequest $request)
    {
        $info = $request->only('email', 'password');
        if (Auth::attempt($info)) {
            if (\auth()->user()->user_type=='employer') {
                return redirect()->route('dashboard.profile');
            }else
            return redirect('/');
        }
        return redirect()->route('login')->with('errorMessage', 'یه اشتباهی شده دوباره وارد شو');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'کاربر با موفقیت خارج شد.');
    }
}
