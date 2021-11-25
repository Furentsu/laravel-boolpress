@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{asset('storage/' . $post->post_image)}}" alt="{{$post->post_title}}">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h5 class="card-title">{{$post->author}}</h5>
            <h5 class="card-title">{{$post->date}}</h5>
            
            <h5 class="card-title">
                @forelse ($post->tags as $tag)
                    <span class ="badge p-1 mx-1" style="background-color: {{$tag->color}}"> {{$tag->name }} </span>
                @empty
                    No tag to display...
                @endforelse 
            </h5>
    
            <p class="card-text">{{$post->post_content}}</p>
            <a href="{{route('backoffice.posts.index')}}" class="btn btn-outline-primary">Go to Posts</a>
            </div>
        </div>
    </div>
    
@endsection