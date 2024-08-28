@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="col-md-6 p-5">
            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="" >لوگو </label>
                    <input type="file" class="form-control" name="profile_pic">
                </div>
                @if(auth()->user()->profile_pic)
                    <img src="{{asset('storage/'.auth()->user()->profile_pic)}}" width="150">
                @endif
                <div class="form-group">
                    <label for="" > نام شرکت </label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success"  value="go">
                </div>
            </form>
        </div>
    </div>
@endsection
