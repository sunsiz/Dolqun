<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilghetRequest;

class FilghetesController extends Controller
{
    public function create()
    {
        return view('filghet.create');
    }

    public function store(FilghetRequest $filghetRequest)
    {
        dd($filghetRequest->all());
    }
}
