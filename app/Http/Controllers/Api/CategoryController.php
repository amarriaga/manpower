<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => 'validation',
                'errors' => $validator->errors()
            ]);
        }

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return response()->json(
            $category
        );
    
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'error' => 'category not found'
            ],404);
        }
        return response()->json(
            $category
        );
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => 'validation',
                'errors' => $validator->errors()
            ]);
        }
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
                'error' => 'Category not found'
            ],404);
        }
        return response()->json(
            $category
        );
    }
}
