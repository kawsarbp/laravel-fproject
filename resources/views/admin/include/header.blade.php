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
    <style>
        svg.w-5.h-5 {
            height: 12px;
        }
    </style>
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
                <li class="nav-item"><a class="nav-link {{request()->is('admin/dashboard') ?'active':'' }}" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{request()->is('admin/category')?'active':'' }} {{request()->is('admin/category/create')?'active':'' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{request()->is('admin/category/create')?'active':'' }}" href="{{route('admin.category.create')}}">Add Category</a></li>
                        <li><a class="dropdown-item {{request()->is('admin/category')?'active':'' }}" href="{{route('admin.category.index')}}">Manage Categories</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<br>
