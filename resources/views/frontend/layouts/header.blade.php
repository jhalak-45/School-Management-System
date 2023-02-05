<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School Management System</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="https://jhalakdhami.com.np/jhalak.jpg">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light  bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    @if (Route::has('login'))
                        <li class="nav-item">

                            @auth
                                <a href="{{ url('/home') }}"
                                    class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            </li>
                            <li class="nav-item">
                            @else
                                <a href="{{ route('login') }}"
                                    class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">

                                    <a href="{{ route('register') }}"
                                        class="ml-4 nav-link text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                        </li>
                    @endif
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center  sm:pt-0">

    </div>
