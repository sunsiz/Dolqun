<?php

namespace App\Http\Controllers\Home;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePhotoRequest;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show', 'list']
        ]);
    }

    public function index()
    {
        $photos = Photo::orderBy('id', 'DESC')->paginate(10);
        return view('photos.index', compact('photos'));
    }

    public function list()
    {
        $photos = Photo::orderBy('id', 'DESC')->paginate(16);
        return view('photos.list', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(CreatePhotoRequest $request)
    {

        Photo::create([
            'title' => $request->get('title'),
            'type' => $request->get('type'),
            'body' => $request->get('body'),
            'thumb' => $request->get('thumb'),
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('success', 'رەسىم يوللاش غەلبىلىك بولدى');
        return redirect()->route('photos.index');
    }

    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function update(CreatePhotoRequest $request, Photo $photo)
    {

        $data = [
            'title' => $request->get('title'),
            'type' => $request->get('type'),
            'body' => $request->get('body'),
            'thumb' => $request->get('thumb'),
            'user_id' => Auth::user()->id,
        ];

        $photo->update($data);

        session()->flash('success', 'رەسىم تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('photos.index');
    }

    public function thumb(Request $request)
    {
        $file = $request->file('img');
        $filename = md5(time()) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('thumbs'), $filename);

        return response()->json(['url' => '/thumbs/' . $filename]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }
}
