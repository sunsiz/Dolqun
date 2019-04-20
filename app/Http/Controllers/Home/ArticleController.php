<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where(['id' => $id, 'status' => 1])->firstOrFail();
        $post->increment('clicks');

        return view('posts.show', compact('post'));
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->get('title'),
            'slug' => '',
            'description' => $request->get('description'),
            'body' => $request->get('body'),
            'thumb' => $request->get('thumb'),
            'status' => $request->get('status'),
            'category_id' => $request->get('category_id'),
            'user_id' => Auth::user()->id,
            'author' => Auth::user()->name,
        ]);

        session()->flash('success', 'يازما يوللاش غەلبىلىك بولدى، رەسمىي يوللىنىشتىن بۇرۇن قايتا ئۆزگەرتەلەيسىز');
        return redirect()->route('articles.index');
    }

    public function thumb(Request $request)
    {
        $file = $request->file('img');
        //文件名
        $filename = md5(time()).'.'.$file->getClientOriginalExtension();
        //上传
        $file->move(public_path('thumbs_posts'), $filename);

        return response()->json(['url' => '/thumbs_posts/'.$filename]);
    }
}
