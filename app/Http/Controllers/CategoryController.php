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

        $product = new Category();
        $product->fill($request->all());
        $product->save();

        return redirect()->back();
    
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $product = Category::find($request->id);
        $product->fill($request->all());
        $product->save();

        return redirect()->back();
    
    }

    public function destroy(Request $request) {
        $product = Category::find($request->id);
        $product->delete();

        return redirect('categories');
    }
}
