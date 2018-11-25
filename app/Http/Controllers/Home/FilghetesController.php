<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilghetRequest;
use App\Models\Filghet;

class FilghetesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function create()
    {
        return view('filghet.create');
    }

    public function store(FilghetRequest $filghetRequest)
    {
        Filghet::create([
            'ug' => $filghetRequest->get('ug'),
            'zh' => $filghetRequest->get('zh'),
            'other' => $filghetRequest->get('other'),
            'description' => $filghetRequest->get('description'),
        ]);

        session()->flash('success', 'قوشۇش غەلبىلىك بولدى');
        return redirect()->back();
    }

    public function show($id)
    {
        $filghet = Filghet::findOrFail($id);
        return view('filghet.show', compact('filghet'));
    }
}
