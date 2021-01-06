<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function index()
    {
        $posts = Post::with(['user','likes'])->latest()->paginate(20);
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
           'body'=>'required'
        ]);

        //store
        $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        //redirect
        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete');
        $post->delete();
        return back();
    }
}
