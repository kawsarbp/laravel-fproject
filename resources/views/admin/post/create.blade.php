@extends('admin.include.layouts')
@section('title')
    Add Post
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
                    <div class="card-header">Add new Post</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" value="{{old('title')}}" name="title" id="title"
                                   placeholder="Please enter your name">
                            @error('name') <span style="font-style: italic; color: red;">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo">
                            @error('photo') <span style="font-style: italic; color: red;">{{$message}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="15" rows="5" class="form-control"></textarea>
                            @error('description') <span style="font-style: italic; color: red;">{{$message}}</span> @enderror
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
