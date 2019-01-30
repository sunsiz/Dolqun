<?php

namespace App\Http\Controllers\Home;

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
        return view('albums.index');
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }

    public function show()
    {

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
