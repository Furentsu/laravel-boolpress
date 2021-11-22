<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('backoffice.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('backoffice.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = $request->all();
        $data['post_date'] = Carbon::now();
        $post = new Post();

        $post->fill($data); 
        $post->slug = Str::slug($post->title, '-');
        $post->save();

        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);

        return redirect()->route('backoffice.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backoffice.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view("backoffice.posts.edit", compact("post", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required'
        ]);
        
        $data = $request->all();
        $data['post_date'] = Carbon::now();

        $post->fill($data); 
        $post->slug = Str::slug($post->title, '-');
        $post->update();

        return redirect()->route('backoffice.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('backoffice.posts.index')->with('deleted_post', $post->title)->with("delete_notification", "The selected post has just been successfully removed FOREVER.");
    }
}
