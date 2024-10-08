<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Http\Requests\UpdatePostJobRequest;
use App\Models\listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;
use Yajra\DataTables\DataTables;

class PostJobController extends Controller
{
    public  function index()
    {
        $jobs = Listing::all();
        return view('job.index',compact('jobs'));
    }
    public function create()
    {
        return view('job.formCreate');
    }

    public function store(PostJobRequest $request)
    {
    $imgPath = $request->file('image')->store('image', 'public');
    Listing::create([
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
        $job = Listing::find($job);
      return view('job.formEdit', compact('job'));
    }

    public function update(UpdatePostJobRequest $request, $id)
    {
        $job = Listing::find($id);
        if ($request->has('image')){
            $imgPath = $request->file('image')->store('image', 'public');
            $job->update(['image'=>$imgPath]);
        }
        $job->update($request->except('image'));
        return redirect()->route('index.job');
    }

    public function destroy(Listing $id)
    {
        $id->delete();
        return redirect()->route('index.job');
    }

}
