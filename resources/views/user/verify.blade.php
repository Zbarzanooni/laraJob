@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <p>قعال سازی اکانت</p>
                </div>
                <div class="card-body">
                    <p>اکانت شما فعال نیست لطفا برای فعال سازی به ایمیل خود مراجعه کنید .</p> <a href="{{route('resend.verify')}}">ارسال مجدد لینک </a>
                </div>
            </div>
        </div>
    </div>
@endsection
