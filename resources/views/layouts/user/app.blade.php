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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')
</body>
</html>
<style>
    .nav-item a{
        color: white;
    }
    body{
        background-color:#f5f5f5 ;
    }
</style>
