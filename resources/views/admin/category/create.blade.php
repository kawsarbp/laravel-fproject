@extends('admin.include.layouts')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{route('admin.category.store')}}" method="POST">
                @csrf
                @if(session()->has('message'))
                    <div class="alert text-center alert-{{session('type')}}">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">Add new Category</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" name="name" id="name"
                                   placeholder="Please enter your name">
                            @error('name') <span style="font-style: italic; color: red;">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="active" value="active">
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                            @error('status') <span style="font-style: italic; color: red;">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
