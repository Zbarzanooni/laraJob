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
                                <a class="nav-link" href="{{route('profile')}}">پروفایل </a>
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
