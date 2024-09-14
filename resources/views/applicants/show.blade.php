@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>{{$job->title}}</h3>
            </div>
        </div>
        @foreach($job->users as $user)
            <div class="card mt-5 {{$user->pivot->interview ? 'card-border' : ''}}">
                <div class="row g-0">
                    <div class="col-auto">
                        @if($user->profile_pic)
                            <img src="{{Storage::url($user->profile_pic)}}" class="rounded-circle" style="width: 150px" alt="">
                        @else
                            <img src="" class="rounded-circle" style="width: 150px" alt="">
                        @endif
                    </div>
                    <div class="col-auto">
                        <div class="card-body">
                            <div class="fw-bold">{{$user->name}} </div>
                            <div class="card-text">{{$user->email}} </div>
                            <div class="card-text">{{$user->pivot->crated_at}} </div>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="{{Storage::url($user->resume)}}" class="btn btn-primary">دانلود رزومه </a>
                        <form action="" method="post">
                            @csrf

                            <a href="" class="btn btn-dark">تایید برای مصاحبه </a>
                            <a href="" class="btn btn-danger">رد </a>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
        </div>

@endsection
