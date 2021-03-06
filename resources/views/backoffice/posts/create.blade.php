@extends('layouts.app')

@section('content')
    <div class="container">

        <section id="post-form">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
            @endif

            <form action="{{route('backoffice.posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <legend class="h5">Tags</legend>
                    <div class="form-check form-check-inline">
                        
                        @foreach ($tags as $tag)
                            <input type="checkbox" class="form-check-input mx-2" 
                            id="{{ $tag->id }}" value="{{$tag->id}}" 
                            name="tags[]" @if(in_array($tag->id, old('tags', []))) checked @endif>

                            <label class="form-check-label me-2" for="{{$tag->id}}">{{$tag->name}}</label>    
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{old('author', $post->author)}}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" placeholder="Choose an image" id="image" name="image" value="{{old('image', $post->post_image)}}">
                </div>

                <div class="mb-3">
                    <label for="post_content" class="form-label">Post Content</label>
                    <textarea class="form-control" id="post_content" name="post_content">{{old('post_content', $post->post_content)}}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </section>
        
    </div>
@endsection