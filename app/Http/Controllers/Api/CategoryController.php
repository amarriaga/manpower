<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();
        return response()->json(
            $categories->all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->json(
            $category
        );
    
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'error' => 'producto no encontrado'
            ],404);
        }
        return response()->json(
            $category
        );
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($request->id);
        $category->fill($request->all());
        $category->save();

        return response()->json(
            $category
        );
    
    }

    public function destroy(Request $request) {
        $category = Category::find($request->id);
        $category->delete();
        if (!$category) {
            return response()->json([
                'error' => 'producto no encontrado'
            ],404);
        }
        return response()->json(
            $category
        );
    }
}
