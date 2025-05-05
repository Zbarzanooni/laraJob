<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
       $jobs = Listing::all();
       return view('home',compact('jobs'));
   }

   public function show($slug)
   {
       $job = Listing::with('profile')->where('slug',$slug)->first();
       return view('user.job-show', compact('job'));
   }

}
