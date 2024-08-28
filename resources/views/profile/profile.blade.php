@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 p-5">
                <ul>
                   <li class="list-group " onclick="userInfo()">اطلاعات حساب کاربری</li>
                    <li class="list-group " onclick="changePass()">تغییر رمز عبور</li>
                    <li class="list-group " onclick="uploadResome()">اپلود رزومه</li>
                </ul>
            </div>
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="col-md-6 p-5" id="user-info">
                <h3>اطلاعات حساب کاربری </h3>
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

            <div class="col-md-6 p-5" id="change-pass">
                <h3>تغییر رمز عبور</h3>
                <form action="{{route('update.user.password')}}" method="post"  id="new-password-form">@csrf
                    <div class="form-group">
                        <label for="" >پسورد فعلی  </label>
                        <input type="password" class="form-control" name="current_password" >
                    </div>
                    <div class="form-group">
                        <label for="" >پسورد جدید </label>
                        <input type="password" class="form-control" name="new_password" >
                    </div>
                    <div class="form-group">
                        <label for="" > تکرار پسورد جدید </label>
                        <input type="password" class="form-control" name="new_password_confirmation" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success"  value="go">
                    </div>
                </form>
            </div>

            <div class="col-md-6 p-5" id="upload-resome">
                <h3>اپلود رزومه </h3>
                <form action="{{route('upload.resume')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="" >فایل رزومه  </label>
                        <input type="file" class="form-control" name="resume" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success"  value="go">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        document.getElementById("user-info").style.display = "block";
        document.getElementById("change-pass").style.display = "none";
        document.getElementById("upload-resome").style.display = "none";
        function userInfo() {
            document.getElementById("user-info").style.display = "block";
            document.getElementById("change-pass").style.display = "none";
            document.getElementById("upload-resome").style.display = "none";
        }
        function changePass(){
            document.getElementById("user-info").style.display = "none";
            document.getElementById("change-pass").style.display = "block";
            document.getElementById("upload-resome").style.display = "none";
        }
        function uploadResome(){
            document.getElementById("user-info").style.display = "none";
            document.getElementById("change-pass").style.display = "none";
            document.getElementById("upload-resome").style.display = "block";
        }
    </script>
    <script>
        $(document).ready(function(){
        $(#new-password-form).on('submit', function(event){
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {

                },
                error: function(response) {
                }
            });
        });
        });
    </script>
@endsection
