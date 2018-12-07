<?php

namespace App\Http\Controllers\Home;

use App\Models\Photo;
use Auth;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show', 'list']
        ]);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('posts.list', compact('posts'));
    }

    public function list()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('posts.list', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = [
            'title' => $request->get('title'),
            'slug' => '',
            'description' => $request->get('description'),
            'body' => $request->get('body'),
            'status' => $request->get('status'),
            'user_id' => Auth::user()->id,
            'author' => Auth::user()->name,
        ];

        $post->update($data);

        session()->flash('success', 'يازما تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('posts.index');

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

    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }
}
