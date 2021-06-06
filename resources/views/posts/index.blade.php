@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
    @auth
        <a class="btn btn-primary" href="{{url('/posts/myPosts')}}" role="button" >Mis posts</a>
    @endauth
    
    @foreach($posts as $post)
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <h5 class="card-title">
                <a href="{{ url('/posts/'. $post->id) }}">
                       {{$post->title}}
                </a>
                </h5> 
            </div>
        </div>
    </div>
    @endforeach
    
    
</div>
</div>    
@endsection