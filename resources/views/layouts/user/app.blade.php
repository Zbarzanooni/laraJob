<!doctype html>
<html lang="en">
@include('layouts.user.header')
<body>
@include('layouts.user.navbar')
    <div id="layoutSidenav_content" class ="bg-light">
        <div class="col-md-2">
            @include('layouts.user.sidebar')
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
        @include('layouts.user.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('script')
</body>
</html>
<style>
    .nav-item a{
        color: white;
    }
</style>
