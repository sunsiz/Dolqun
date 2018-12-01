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

    public function index()
    {
        $filghetes = Filghet::orderBy('id', 'DESC')->paginate(10);
        return view('filghet.index', compact('filghetes'));
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
        return view('filghet.edit', compact('filghet'));
    }

    public function update(FilghetRequest $request, Filghet $filghet)
    {
        $data = [
            'ug' => $request->get('ug'),
            'zh' => $request->get('zh'),
            'other' => $request->get('other'),
            'description' => $request->get('description'),
        ];

        $filghet->where('id', '=', $request->get('id'))->update($data);

        session()->flash('success', 'فىلغەت تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('filghetes.index');
    }

    public function destroy($filghet)
    {
        Filghet::where('id', '=', $filghet)->delete();

        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }
}
