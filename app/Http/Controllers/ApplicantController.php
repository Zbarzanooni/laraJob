<?php

namespace App\Http\Controllers;

use App\Mail\InterviewRequest;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class ApplicantController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = JobListing::withCount('users')->where('user_id',auth()->user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('view', function ($data){
                    return '<a href='. route('applicant.show', $data->slug).' class="edit btn btn-success btn-sm">نمایش</a>';
                })
                ->rawColumns(['view'])
                ->make(true);
        }
        return view('applicants.index');
    }

    public function show($slug)
    {
        $job = JobListing::where('slug', $slug)->first();
     //   $applicants = $job->users()->get();

        return view('applicants.show', compact('job'));
    }

    public function interview($jobId , $userId)
    {
        $job = JobListing::find($jobId);
        if ($job){
            $job->users()->updateExistingPivot($userId,['interview' => true ]);
            $user = User::find($userId);
            Mail::to($user->email)->queue(new InterviewRequest($user->name, $job->title));
            return back();
        }
    }

    public function sendResume($jobId)
    {
        $jos = JobListing::find($jobId);
        if ($jos){
        $jos->users()->attach([auth()->user()->id]);
        }
    }
}
