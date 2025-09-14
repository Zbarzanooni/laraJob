<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Http\Requests\UpdatePostJobRequest;
use App\Models\JobListing;

class PostJobController extends Controller
{
    public  function index()
    {
        $jobs = JobListing::all();
        return view('job.index',compact('jobs'));
    }
    public function create()
    {
        return view('job.formCreate');
    }

    public function store(PostJobRequest $request)
    {
    $imgPath = $request->file('image')->store('image', 'public');
        JobListing::create([
        'title'      =>$request->title,
        'description'=>$request->description,
        'salary'     =>$request->salary,
        'rolse'      =>$request->rolse,
        'address'    =>$request->address,
        'deadline'   =>$request->date,
        'user_id'    =>auth()->user()->id,
        'image'      =>$imgPath,
        'job_type'   =>$request->job_type

    ]);
    return back();
    }

    public function edit($job)
    {
        $job = JobListing::find($job);
      return view('job.formEdit', compact('job'));
    }

    public function update(UpdatePostJobRequest $request, $id)
    {
        $job = JobListing::find($id);
        if ($request->has('image')){
            $imgPath = $request->file('image')->store('image', 'public');
            $job->update(['image'=>$imgPath]);
        }
        $job->update($request->except('image'));
        return redirect()->route('index.job');
    }

    public function destroy(JobListing $id)
    {
        $id->delete();
        return redirect()->route('index.job');
    }

}
