@include('layouts.app')

<div class="controller"  style="background-color: #e9e5e5">
    <div class="row " >
        <div class="col-md-6">
            <a href="{{route('create.seeker')}}"><img src="{{asset('image/register-in-manamo-site-and-application.jpg')}}" class="" alt="" /></a>
        </div>
        <div class="col-md-6 mt-5 ">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-md-6 ">
                    <div class="card d-flex align-items-center justify-content-center">
                        <div class="card-body d-f justify-content-center">
                            <form action="{{route('store.login')}}" method="post">@csrf
                                <div class="form-group p-2">
                                    <input type="text" class="form-control" name="email" placeholder=" ایمیل ">
                                </div>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                                <div class="form-group p-2">
                                    <input type="text" class="form-control" name="password" placeholder="رمز عبور ">
                                </div>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                                <div class="form-group d-flex justify-content-center m-2" style="background-color: #399d39">
                                    <button class="btn text-white "> ورود </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
