<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->paginate(10);

        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(AlbumRequest $request)
    {

        Album::create([
            'name_ug' => $request->get('name_ug'),
            'name_zh' => $request->get('name_zh'),
            'bio' => $request->get('bio'),
            'thumb' => $request->get('thumb'),
        ]);

        session()->flash('success', 'قوشۇش غەلبىلىك بولدى');
        return redirect()->route('album.index');
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $data = [
            'name_ug' => $request->get('name_ug'),
            'name_zh' => $request->get('name_zh'),
            'bio' => $request->get('bio'),
            'thumb' => $request->get('thumb'),
        ];

        $album->update($data);

        session()->flash('success', 'تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('album.index');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }

    public function thumb(Request $request)
    {
        $file = $request->file('img');
        //文件名
        $filename = md5(time()).'.'.$file->getClientOriginalExtension();
        //上传
        $file->move(public_path('images/album'), $filename);

        return response()->json(['url' => '/images/album/'.$filename]);
    }
}
