<?php

namespace App\Http\Controllers;

use App\Mail\InterviewRequest;
use App\Models\JobListing;
use App\Models\User;
use App\Notifications\InterviewNotification;
use App\Services\NotificationService;
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
            $user->notify(new InterviewNotification($job));
            return back()->with('success', 'کاربر با موفقیت برای مصاحبه دعوت شد.');
        }
        return back()->with('error', 'شغل مورد نظر یافت نشد.');
    }

    public function sendResume($jobId, NotificationService $notificationService)
    {
        $job = JobListing::find($jobId);
        $user = auth()->user();
        if ($job and $job->users->contains('id', $user->id)) {
        return back()->with('error', 'شما قبلاً برای این شغل درخواست داده‌اید.');
        }
        $job->users()->attach([$user->id]);
        $notificationService->jobApplied($user, $job);

        return back()->with('success', 'درخواست شما ثبت شد');
    }
}
