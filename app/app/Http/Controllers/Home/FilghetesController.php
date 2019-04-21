<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilghetRequest;
use App\Models\Album;
use App\Models\Filghet;

class FilghetesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $filghetes = Filghet::orderBy('id', 'DESC')->paginate(10);
        return view('filghet.index', compact('filghetes'));
    }

    public function create()
    {
        $albums = Album::select('id','name_ug')->orderBy('id','desc')->get();

        return view('filghet.create', compact('albums'));
    }

    public function store(FilghetRequest $filghetRequest)
    {
        $albums = $filghetRequest->get('albums');
        //$albums = $this->normalizeAlbums($filghetRequest->get('albums'));

        $filghet = Filghet::create([
            'ug' => $filghetRequest->get('ug'),
            'zh' => $filghetRequest->get('zh'),
            'other' => $filghetRequest->get('other'),
            'description' => $filghetRequest->get('description'),
        ]);

        //操作问题和话题的关联表 attach()
        $filghet->albums()->attach($albums);

        session()->flash('success', 'قوشۇش غەلبىلىك بولدى');
        return redirect()->route('filghetes.index');
    }

    public function show($id)
    {
        $filghet = Filghet::findOrFail($id);
        return view('filghet.show', compact('filghet'));
    }

    public function edit($id)
    {
        $filghet = Filghet::findOrFail($id);

        $albums = Album::select('id','name_ug')->orderBy('id','desc')->get();

        $filghetAlbums = $this->filghetAlbumsById($filghet->albums);

        return view('filghet.edit', compact('filghet', 'albums', 'filghetAlbums'));
    }

    public function update(FilghetRequest $request,  $id)
    {
        $filghet = Filghet::findOrFail($id);

        $data = [
            'ug' => $request->get('ug'),
            'zh' => $request->get('zh'),
            'other' => $request->get('other'),
            'description' => $request->get('description'),
        ];

        $albums = $request->get('albums');

        $filghet->update($data);

        //更新关联表
        $filghet->albums()->sync($albums);

        session()->flash('success', 'فىلغەت تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('filghetes.index');
    }

    public function destroy($filghet)
    {
        Filghet::where('id', '=', $filghet)->delete();

        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }

    public function normalizeAlbums($albums)
    {
        return collect($albums)->map(function ($album) {
            return $album;
        })->toArray();
    }

    public function filghetAlbumsById($filghetAlbums)
    {
        return collect($filghetAlbums)->map(function ($filghetAlbum) {
            return (int) $filghetAlbum['id'];
        })->toArray();
    }
}
