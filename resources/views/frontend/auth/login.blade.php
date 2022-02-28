@extends('frontend.include.layouts')
@section('title')
    User Auth
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">User Login Form</h5>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-{{session('type')}} text-center">{{session('message')}}</div>
            @endif
            <form action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{old('email')}}" name="email"  id="email" placeholder="Please enter your e-mail">
                    @error('email') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Please enter your password">
                    @error('password') <span style="color: red; font-style: italic;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
