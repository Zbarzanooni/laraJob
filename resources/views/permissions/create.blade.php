@extends('layouts.admin.main')

@section('content')

    <div class=" p-5">
        <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">نام دسترسی</label>
                <input type="text" name="name" class="form-control">
            </div>
            @if($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
            <div class="form-group">
                <label for="">توضیحات</label>
                <input type="text" id="" name="description" class="form-control ">
            </div>
            @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">ثبت </button>
            </div>
        </form>
    </div>


@endsection
