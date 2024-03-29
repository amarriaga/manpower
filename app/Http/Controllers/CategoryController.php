<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();
        return view('category.list',compact('categories'));
    }

    public function create() {
        $categories = Category::get();
        return view('category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->back();
    
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect('categories');
        }
        return view('category.edit',compact('category'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($request->id);
        $category->fill($request->all());
        $category->save();

        return redirect()->back();
    
    }

    public function destroy(Request $request) {
        $category = Category::find($request->id);
        $category->delete();

        return redirect('categories');
    }
}
