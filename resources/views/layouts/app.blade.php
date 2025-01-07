<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar   navbar-expand-lg  bg-success  " >
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">لاراجاب </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @if(auth()->user())
                        <li class="nav-item dropdown">
                            <button class="dropdown-toggle bg-success border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{\Illuminate\Support\Facades\Storage::url(auth()->user()->profile_pic ?? '')}}" width="40" class="rounded-circle" alt="">
                            </button>
                            <ul class="dropdown-menu bg-success">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.profile.seeker')}}">پروفایل </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}">خروج </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="/">خانه </a>
                        </li>
                    @endif
                    @if(!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">ورود </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create.seeker')}}">ثبت نام کارجو</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create.employer')}}">ثبت نام کارفرما </a>
                    </li>
                    @endif
                </ul>
            </div>
            <form class="d-flex " role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

 @yield('content')
  </body>
</html>
<style>
    .nav-item a{
        color: white;
    }
</style>
