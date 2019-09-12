<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::with('category')->get();
        return response()->json(
            $products->all()
        );
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ]);

        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return response()->json(
            $product
        );
    
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'error' => 'producto no encontrado'
            ],404);
        }
        return response()->json(
            $product
        );
    }

    public function update(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ]);

        $product = Product::find($request->id);
        $product->fill($request->all());
        $product->save();

        return response()->json(
            $product
        );
    
    }

    public function destroy(Request $request) {
        $product = Product::find($request->id);
        $product->delete();
        if (!$product) {
            return response()->json([
                'error' => 'producto no encontrado'
            ],404);
        }
        return response()->json(
            $product
        );
    }
}
