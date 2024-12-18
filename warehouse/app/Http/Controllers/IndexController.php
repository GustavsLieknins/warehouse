<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $totalProducts = Product::where('status_id', 2)->count();
        $lowStockItems = Product::where('quantity', '<', 5)->where('status_id', 2)->count();
        $recentOrders = Product::where('status_id', 1)->count();
        return view('index', compact('categories', 'products', 'totalProducts', 'lowStockItems', 'recentOrders'));
    }
    public function showCreate()
    {
        // return "hi";
        $categories = Category::all();
        return view('create', compact('categories'));    
    }
    
}