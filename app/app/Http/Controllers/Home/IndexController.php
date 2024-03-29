<?php

namespace App\Http\Controllers\Home;

use App\Models\Album;
use App\Models\Filghet;
use App\Models\Photo;
use App\Models\Post;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);

        $photos = Photo::orderBy('id', 'DESC')->take(12)->get();

        $filghets = Filghet::orderBy('id', 'DESC')->take(6)->get();

        $albums = Album::orderBy('id', 'DESC')->take(8)->get();

        return view('home.index', compact('posts', 'photos', 'filghets', 'albums'));
    }

    public function download()
    {
        return view('home.download');
    }
}
