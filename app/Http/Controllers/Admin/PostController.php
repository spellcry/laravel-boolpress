<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::limit(52)->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:5',
            'category_id' => 'nullable|exists:App\Category,id',
            'tags' => 'exists:tags,id'
        ]);        
        $params['slug'] = Post::getUniqueSlugFrom($params['title']);
        $post = Post::create($params);

        $post->tags()->sync($params['tags']);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $params = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:5',
            'category_id' => 'nullable|exists:App\Category,id',
            'tags' => 'exists:tags,id'
        ]);
        if ( $params['title'] != $post->title ) {
            $params['slug'] = Post::getUniqueSlugFrom($params['title']);
        }        
        $post->update($params);

        $post->tags()->sync(isset($params['tags']) ? $params['tags'] : []);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
