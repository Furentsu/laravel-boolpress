@extends('layouts.app')

@section('content')
    <div class="container-flex p-5">
        <header>
            <h5><a href="{{route('backoffice.posts.create')}}">Create new post</a></h5>
        </header>

        @if(session("deleted_post")) 
            <div class="alert alert-danger">
                {{session("delete_notification")}}
            </div>
        @endif
        
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

                        <td>
                            @forelse ($post->tags as $tag)
                                <span class ="badge p-1 mx-1" style="background-color: {{ $tag->color}}"> {{ $tag->name }} </span>
                            @empty
                                No tag to display...
                            @endforelse 
                        </td>
                        
                        <td><a href="{{route('backoffice.posts.edit', $post)}}" class="btn btn-outline-primary">Edit this post</a></td> 
                        <td>
                            <form action="{{route('backoffice.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
    
                                <button class="btn btn-outline-danger" type="submit">Delete this post</button>
                            </form>
                        </td>

                    </tr>
                    
                @empty
                    <tr><h3> No posts to display here</h3></tr>
                @endforelse
            </tbody>
        </table>

        <footer class="w-100">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </footer>
    </div>
@endsection