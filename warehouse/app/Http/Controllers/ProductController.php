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
            'transaction_id' => 2,
            'status_id' => 2
        ]);

        return redirect()->route('index')->with('success', 'Product created successfully');
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function lowStock()
    {
        $lowStockItems = Product::where('quantity', '<', 5)->get();
        return view('products.lowStock', compact('lowStockItems'));
    }

    public function ordered()
    {
        $orderedProducts = Product::where('status_id', 1)->get();
        return view('products.ordered', compact('orderedProducts'));
    }

    
    public function indexFilter(Request $request)
    {
        $filter = $request->filter;

        if ($filter === 'available') {
            $products = Product::where('status_id', 2)->get();
        } elseif ($filter === 'ordered') {
            $products = Product::where('status_id', 1)->get();
        } elseif ($filter === 'low_stock') {
            $products = Product::where('quantity', '<', 5)->get();
        } else {
            $products = Product::all();
        }

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }
}

