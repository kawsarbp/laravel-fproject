@extends('frontend.include.layouts')
@section('title')
    User Auth
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">User Registration Form</h5>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-{{session('type')}} text-center">{{session('message')}}</div>
            @endif
            <form action="{{route('user.registration')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" name="name" id="name" placeholder="Please enter your name">
                    @error('name') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{old('email')}}" name="email"  id="email" placeholder="Please enter your e-mail">
                    @error('email') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="photo" class="form-label">Photo</label>--}}
{{--                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo">--}}
{{--                    @error('photo') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror--}}
{{--                </div>--}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Please enter your password">
                    @error('password') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="c_password" class="form-label">Confirm Password</label>
                    <input class="form-control " type="password" name="password_confirmation" id="c_password" placeholder="Please enter Confirm password">
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-outline-success">Registration</button>
                </div>
            </form>
        </div>
    </div>
@endsection
