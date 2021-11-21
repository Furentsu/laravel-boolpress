@extends('layouts.app')

@section('content')
    <div class="container">

        <section id="post-form">
            <form action="{{route('backoffice.posts.update', $post)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{$post->author}}" required>
                </div>

                <div class="mb-3">
                    <label for="post_image" class="form-label">Image URL</label>
                    <textarea class="form-control" id="post_image" name="post_image" required>{{$post->post_image}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="post_content" class="form-label">Post Content</label>
                    <textarea class="form-control" id="post_content" name="post_content" required>{{$post->post_content}}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </section>
        
    </div>
@endsection