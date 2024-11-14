<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <title>@yield('title', 'Varsayılan Başlık')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .card{
            margin-top: 10px;
        }
    </style>
</head>
<body style="background-color: rgb(192 192 192)">




<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-black bg-black" >
    <!-- Container wrapper -->
    <div class="container" >
        <!-- Toggle button -->
        <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0 text-light" href="/">
                <img
                    src="{{asset("img/white_logo.png")}}"
                    height="40"
                    alt="MDB Logo"
                    loading="lazy"
                />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/courses">Kurslar</a>
                </li>

            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="link-secondary me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>


            <!-- Avatar -->
            <div class="dropdown">
                <a
                    data-mdb-dropdown-init
                    class="dropdown-toggle d-flex align-items-center hidden-arrow text-light"
                    href="#"
                    id="navbarDropdownMenuAvatar"
                    role="button"
                    aria-expanded="false"
                >
                    @if (auth()->check())  <img style="height: 25px" src="/storage/{{ Auth::user()->user_image }}" alt="" sizes="" srcset=""> {{ Auth::user()->name }}@else <img style="height: 25px" src="/storage/default_images/user_image.png" alt="" sizes="" srcset=""> @endif
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuAvatar"
                >
                   @auth <li>
                        <a class="dropdown-item" href="/profile">{{ __('Profile') }}</a>
                    </li>
                    @endauth
                    <li>
                        @if (auth()->check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input type="submit" value="{{ __('Log Out') }}" class="dropdown-item" href="{{ route('logout') }}">

                        </form>
                            @else
                                <a class="dropdown-item" href="/login">login</a>
                            @endif
                    </li>

                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
@yield("slide", "")



@yield("navigasyon", "")
@yield("content")



<script  src="{{asset('js/mdb.es.min.js')}}"></script>
<script  src="{{asset('js/mdb.umd.min.js')}}"></script>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
</body>
</html>
