<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createIndex()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|integer|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:1'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status_id' => 2
        ]);

        return redirect()->route('index')->with('success', 'Product created successfully');
    }
}

