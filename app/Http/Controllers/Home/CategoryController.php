<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $categorys = Category::orderBy('id', 'DESC')->paginate(10);
        return view('category.index', compact('categorys'));
    }

    public function create()
    {
        $categorys = Category::all();
        return view('category.create', compact('categorys'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->get('name'),
            'bio' => $request->get('bio'),
            'parent_id' => $request->get('parent_id'),
        ]);

        session()->flash('success', 'قوشۇش غەلبىلىك بولدى');
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $categorys = Category::all();
        return view('category.edit', compact('category', 'categorys'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = [
            'name' => $request->get('name'),
            'bio' => $request->get('bio'),
            'parent_id' => $request->get('parent_id'),
        ];

        $category->update($data);

        session()->flash('success', 'تەھرىرلەش غەلبىلىك بولدى');
        return redirect()->route('category.index');
    }

    public function show()
    {
        
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'ئۆچۈرۈش غەلبىلىك بولدى');
        return back();
    }
}
