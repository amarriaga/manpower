<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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
        // return response()->json(
        //     $request->all()
        // );
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => 'validation',
                'errors' => $validator->errors()
            ]);
        }
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
                'error' => 'Product not found'
            ],404);
        }
        return response()->json(
            $product
        );
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'name' => 'required|min:3|max:50',
            'quantity' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error' => 'validation',
                'errors' => $validator->errors()
            ]);
        }
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
                'error' => 'Producct not found'
            ],404);
        }
        return response()->json(
            $product
        );
    }
}
