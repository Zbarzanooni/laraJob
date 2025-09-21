<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $filter = [];
   public function index(Request $request)
   {
       $query = JobListing::query();

       if ($request->filled('job_type')) $query->where('type', $request->job_type);
       if ($request->filled('province')) $query->where('province_id', $request->province);
       if ($request->filled('experience_level')) $query->where('experience_level', $request->experience_level);
       if ($request->filled('title')) $query->where('title', 'like', '%'.$request->title.'%');

       $jobs = $query->get();

       $provinces = Province::all();
       if ($request->ajax()){
           $html = view('partials.jobs_list', compact('jobs'))->render();
           return response()->json(['html'=> $html ]);
       }
       return view('home', compact('jobs', 'provinces'));
   }

   public function show($slug)
   {
       $job = JobListing::with('profile')->where('slug',$slug)->first();
       return view('user.job-show', compact('job'));
   }

   private function getFilter(Request $request)
   {
       $query = JobListing::query();
       if (isset($request->job_type)){
          $query->where('job_type', $request->job_type);
       }
       if (isset($request->experience_level)){
           $query->where('experience_level', $request->get('experience_level'));
       }
       if (isset($request->provinces)){
           $query->where('province_id', $request->provinces);
       }
        return $query->get();
   }

}
