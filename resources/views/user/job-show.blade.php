@extends('layouts.app')

@section('content')
   <div class="container d-flex">
       <div class="col-md-12 d-flex  justify-content-center">
           <div class="card m-5 " style="width: 600px">
               <img src="{{Storage::url('image/images.png') }}" alt="" class="card-img-top">
               <div class="card-body">
                   <h3>{{$job->profile->name}}</h3>
                   <h5>{{$job->title}}</h5>
                   <p>{{$job->description}}</p>
                   <p>{{$job->deadline}}</p>
                   <p>{{$job->address}}</p>
                   <p>{{number_format($job->salary, 2)}}</p>
                   <p>{{$job->job_type}}</p>
               </div>
               <div class="card-footer ">
                   <a href="{{route('applicant.sendResume',$job->id)}}" class="btn btn-success d-flex justify-content-center m-1" id="send-resume">ارسال رزومه </a>
               </div>
           </div>
       </div>
   </div>
@endsection

