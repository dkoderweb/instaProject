<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Palette+Mosaic&family=Roboto+Slab:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/747cc4b4b6.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
    h1 {
        /* font-family: 'Palette Mosaic', cursive; */
        font-family: 'Roboto Slab', serif;
        margin-left: 200px;
    }

    .logo {
        width: 60%;
        height: 50%;
        /* border-radius: 50%; */

    }

    .container_style {
        width: 60%;


        /* background-color: black; */

    }

    main {
        display: flex;
        justify-content: center;
    }

    /* .caption{
        font-size: 1.5rem;
    } */
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Make Instagram as home link  -->
                <a class="navbar-brand" href="/">
                    <h1 class="fs-3 header_name fst-italic fw-bold d-flex align-items-center">
                        <i class="fa fa-instagram" style="font-size:36px"></i>
                        &#160; Instagram   
                    </h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <!-- search function  -->
                        <li class="nav-item">
                            <form action="/search" method="POST" role="search" class="m-auto d-inline w-80">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control" name="q" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"
                                        style="border-color: #ced4da"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </li>
                        <!-- Home view icon  -->
                        <li class="nav-item px-2 {{ Route::is('post.index') ? 'active' : '' }}">
                            <a class="nav-link" href="/">
                                <i class="fa-solid fa-house-chimney fa-xl"></i>

                            </a>
                        </li>
                        <!-- profile view link with profile image  -->
                        <li class="nav-item pl-2">
                            <a href="/profile/{{Auth::user()->id}}" class="nav-link"
                                style="width: 50px; height: 22px; padding-top: 6px;">
                                <img src="{{ asset(Auth::user()->profile->getProfileImage())  }}"
                                    class="rounded-circle w-100">
                            </a>
                        </li>
                        

                        <!-- logout function  -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- content start here  -->
            @yield('content') 
        </main>
    </div>
    <!-- js start here  -->
    @yield('exscript')
</body>

</html>