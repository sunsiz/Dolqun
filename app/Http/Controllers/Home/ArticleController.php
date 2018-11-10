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
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
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
        $file->move(public_path('posts'), $filename);

        return response()->json(['url' => '/posts/'.$filename]);
    }
}
