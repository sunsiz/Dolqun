<?php

namespace App\Http\Controllers\Home;

use App\Models\Filghet;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');
        $keywords = $request->get('keywords');

        if (!$type || !$keywords) {
            return back();
        }

        switch ($type) {
            case 'posts' :
                $posts = Post::where('title','like' , "%".$keywords."%")->get();
                return view('posts.search_index', compact('posts', 'keywords'));
                break;
            case 'filghetes' :
                $filghets = Filghet::where('ug','like' , "%".$keywords."%")->get();
                return view('filghet.search_index', compact('filghets', 'keywords'));
                break;
            case 'photos' :
                $photos = Photo::where('title','like' , "%".$keywords."%")->get();
                return view('photos.search_index', compact('photos', 'keywords'));
                break;
        }
        dd($request->get('type'));
    }
}
