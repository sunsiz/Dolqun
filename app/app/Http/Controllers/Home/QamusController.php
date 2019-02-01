<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QamusController extends Controller
{
    public function create()
    {
        return view('qamus.create');
    }
}
