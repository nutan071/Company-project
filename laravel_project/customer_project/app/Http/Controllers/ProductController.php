<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller
{
    public function index()
    {
          
        $products = Products::all();
    // echo "<pre>";print_r($products);die();
    return view('products.index', compact('products')); 

    }

    public function create()
    {
        return view('products.create');
    }

    

    public function store(Request $request)
    {
        
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->image = $request->input('image');
        
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->image = $request->input('image');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}















