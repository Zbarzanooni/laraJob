@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="col-md-6 p-5">
            <form action="{{route('user.update.profile.seeker')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="" > تصویر </label>
                    <input type="file" class="form-control" name="profile_pic">
                </div>
                @if(auth()->user()->profile_pic)
                    <img src="{{asset('storage/'.auth()->user()->profile_pic)}}" width="150">
                @endif
                <div class="form-group">
                    <label for="" > نام </label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success"  value="go">
                </div>
            </form>
        </div>
    </div>
@endsection
