@extends('admin.include.layouts')
@section('title')
    Manage Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-success text-center">Mange Categories</h3>
            @if(session()->has('message'))
                <div class="alert text-center alert-{{session('type')}}">{{session('message')}}</div>
            @endif
            <div class="">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>SL NO</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->status}}</td>
                            <td>
                                <a href="{{route('admin.category.show',$category->id)}}" class="btn btn-outline-info btn-sm">View</a>
                                <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                                <form action="{{route('admin.category.destroy',$category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection
