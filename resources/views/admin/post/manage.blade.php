@extends('admin.include.layouts')
@section('title')
    Manage Post
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-success text-center">Mange Post</h3>
            @if(session()->has('message'))
                <div class="alert text-center alert-{{session('type')}}">{{session('message')}}</div>
            @endif
            <div class="">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>SL NO</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td><a href="{{$post->slug}}" target="_blank">Click Here</a></td>
                            <td><img style="width: 150px;" src="{{$post->photo}}" alt=""></td>
                            <td>{{$post->status}}</td>
                            <td>
                                <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-outline-info btn-sm">View</a>
                                <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-outline-primary btn-sm">Edit</a>
                                <form action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
