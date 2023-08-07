<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $post = new Post();
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
//

        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return response('Inserted Done');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $post = Post::findorFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return redirect()->route('posts.index');
    }
}
