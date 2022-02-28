@include('frontend.include.header')
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            @yield('content')
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            @include('frontend.include.right-sidebar')
        </div>
    </div>
</div>
@include('frontend.include.footer')
