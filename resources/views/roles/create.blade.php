@extends('layouts.admin.main')

@section('content')

    <div class=" p-5">
        <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">عنوان نقش</label>
                <input type="text" name="name" class="form-control">
            </div>
            @if($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
            <div class="form-group">
                <label for="">توضیحات</label>
                <textarea  id="summernote" name="description" class="form-control summernote"></textarea>
            </div>
            @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
            <div class="form-group">
                <label for="">دسترسی ها </label>
                <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->label}}-{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">کاربران </label>
                <select class="form-control" name="user_id[]" id="user_id" multiple="multiple"  >
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}-{{$user->email}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">ثبت </button>
            </div>
        </form>
    </div>


@endsection
