<nav {{ $attributes->merge(["class"=>"navbar navbar-expand-lg navbar-light"]) }} id="{{ $id }}">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><img
                src="{{ asset('frontend/assets/img/blogger-6605193_1280.png') }}" class="w-100" height="{{ $height }}" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto justify-content-center">
                <li class="nav-item fs-6"><a class="nav-link px-lg-3" href="{{ route('index') }}">Home</a></li>
                <li class="nav-item fs-6 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categories',$category->slug) }}">{{ucwords($category->title)}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item fs-6"><a class="nav-link px-lg-3" href="{{ route('about') }}">About</a></li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item fs-6"><a class="nav-link">{{ auth()->user()->name }}</a></li>
                    <li class="nav-item fs-6"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item fs-6"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
