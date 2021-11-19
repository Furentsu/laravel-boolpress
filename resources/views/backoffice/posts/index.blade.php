@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h5><a href="{{route('backoffice.posts.create')}}">Create new post</a></h5>
        </header>
        
        <table class="table table-bordered table-dark">
            <thead>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
            </thead>

            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td><a href="{{route('backoffice.posts.show', $post)}}">{{$post->title}}</a></td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->post_date}}</td>
                    </tr>
                    
                @empty
                    <tr>No posts to display here </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection