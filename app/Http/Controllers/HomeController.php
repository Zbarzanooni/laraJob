<?php

namespace App\Http\Controllers;

use App\Models\JobListing;

class HomeController extends Controller
{
   public function index()
   {
       $jobs = JobListing::all();
       return view('home',compact('jobs'));
   }

   public function show($slug)
   {
       $job = JobListing::with('profile')->where('slug',$slug)->first();
       return view('user.job-show', compact('job'));
   }

}
