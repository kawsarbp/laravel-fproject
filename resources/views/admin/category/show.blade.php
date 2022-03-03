@extends('admin.include.layouts')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>SL NO</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->status}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
