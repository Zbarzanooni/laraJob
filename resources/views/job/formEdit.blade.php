@extends('layouts.admin.main')
@php
isset($job) ?"ff":"sd";
@endphp
@section('content')
    <div class="container">
        <div class="col-md-6 p-5">
            <form action="{{route('update.post.job')}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">عنوان شغل</label>
                    <input type="text" name="title" class="form-control" value="{{isset($job->title) ? $job->title : "" }}">
                </div>
                @if($errors->has('title'))
                    <span class="text-danger">{{$errors->first('title')}}</span>
                @endif
                <div class="form-group">
                    <label for=""> عکس </label>
                    <input type="file" name="image" class="form-control">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
                <div class="form-group">
                    <label for="">سمت شغلی</label>
                    <input name="rolse" class="form-control " value="{{isset($job->rolse) ? $job->rolse : ""}}">
                </div>
                @if($errors->has('rolse'))
                    <span class="text-danger">{{$errors->first('rolse')}}</span>
                @endif
                <div class="form-group">
                    <label for="">توضیحات</label>
                    <textarea  id="summernote" name="description" class="form-control summernote" placeholder="{{isset($job->description) ? $job->description : ""}}"></textarea>
                </div>
                @if($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
                <div class="form-group">
                    <label for=""> حقوق </label>
                    <input type="text" name="salary" class="form-control" value="{{$job->salary}}">
                </div>
                @if($errors->has('salary'))
                    <span class="text-danger">{{$errors->first('salary')}}</span>
                @endif
                <div class="form-group">
                    <label for=""> ادرس </label>
                    <input type="text" name="address" class="form-control" value="{{$job->address}}">
                </div>
                @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
                <div class="form-group">
                    <label for=""> تاریخ اتمام </label>
                    <input type="date" name="date" class="form-control" value="{{$job->deadline}}">
                </div>
                @if($errors->has('date'))
                    <span class="text-danger">{{$errors->first('date')}}</span>
                @endif
                <div class="form-group">
                    <h6> نوع قرارداد </h6>
                    <div>
                        <input type="radio" id="fullTime" name="job_type"  value="fullTime" {{($job->job_type == "fullTime") ? "checked" : ''}}>
                        <label for="">تمام وقت </label>
                    </div>
                    <div>
                        <input type="radio" id="partTime" name="job_type" value="partTime" {{($job->job_type =="partTime") ? "checked" : ''}}>
                        <label for="">پاره وقت</label>
                    </div>
                    <div>
                        <input type="radio" id="telecommuting" name="job_type" value="telecommuting" {{($job->job_type=="telecommuting") ? "checked" : ''}}>
                        <label for="">دورکاری</label>
                    </div>
                </div>
                @if($errors->has('job_type'))
                    <span class="text-danger">{{$errors->first('job_type')}}</span>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">ثبت </button>
                </div>
            </form>
        </div>
    </div>

@endsection

<script>
    $('#summernote').summernote({
        placeholder: 'Hello bootstrap 4'
    });
</script>
