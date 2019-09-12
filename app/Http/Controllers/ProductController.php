<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::with('category')->get();
        return view('product.list',compact('products'));
    }

    public function create() {
        $categories = Category::get();
        return view('product.create',compact('categories'));
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

        return redirect()->back();
    
    }

    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('product.edit',compact('product','categories'));
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

        return redirect()->back();
    
    }

    public function destroy(Request $request) {
        $product = Product::find($request->id);
        $product->delete();

        return redirect('products');
    }
}
