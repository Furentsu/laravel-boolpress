@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{$post->post_image}}" alt="{{$post->post_image}}">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h5 class="card-title">{{$post->author}}</h5>
            <h5 class="card-title">{{$post->date}}</h5>
    
            <p class="card-text">{{$post->post_content}}</p>
            <a href="{{route('backoffice.posts.index')}}" class="btn btn-outline-primary">Go to Posts</a>
            </div>
        </div>
    </div>
    
@endsection