<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function new(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->get('title'),
            'slug' => '',
            'description' => $request->get('description'),
            'body' => $request->get('body'),
            'status' => $request->get('status'),
            'user_id' => Auth::user()->id,
            'author' => Auth::user()->name,
        ]);

        //操作post_tag第三章表
        //$tags = $this->normalizeTags($request->get('tags'));
        //$post->tags()->attach($tags);


        session()->flash('success', 'يازما يوللاش غەلبىلىك بولدى، رەسمىي يوللىنىشتىن بۇرۇن قايتا ئۆزگەرتەلەيسىز');
        return redirect()->route('posts.index');
    }
}
