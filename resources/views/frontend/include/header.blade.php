<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/frontend/assets/favicon.ico')}}"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/frontend/css/styles.css')}}" rel="stylesheet"/>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                @guest
                <li class="nav-item"><a class="nav-link" href="{{route('user.registerForm')}}">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">login</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{auth()->user()->email}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<br>
