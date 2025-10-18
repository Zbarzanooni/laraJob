<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $filter = [];
   public function index()
   {
       $jobs =  JobListing::all();
       $provinces = Province::orderBy('priority', 'desc')->get();
       return view('home', compact('jobs', 'provinces'));
   }

   public function show($slug)
   {
       $job = JobListing::with('profile')->where('slug',$slug)->first();
       return view('user.job-show', compact('job'));
   }

   public function getFilter(Request $request)
   {
       $query = JobListing::query();
       if (isset($request->job_type)){
          $query->whereIn('job_type', $request->job_type);
       }
       if (isset($request->experience_level)){
           $query->whereIn('experience_level', $request->get('experience_level'));

       }
       if (isset($request->province_id)){
           $query->whereIn('province_id', $request->province_id);
       }
       $jobs = $query->get();
       $html = view('partials.jobs_list', compact('jobs'))->render();
       return response()->json(['html'=> $html]);
   }

}
