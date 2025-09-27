<!doctype html>
<html lang="en">
@include('layouts.user.header')
<body>
@include('layouts.user.navbar')
          <div class="container">
           <div class="row">
               @yield('content')
           </div>

          </div>

   @include('layouts.user.footer')

    @yield('script')
</body>
</html>
<style>
    .nav-item a{
        color: white;
    }
</style>
