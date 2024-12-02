<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Actions;
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
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric|min:0|max:1000000'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'transaction_id' => 2,
            'status_id' => 2
        ]);

        Actions::log('created', $product->id, 'product', $request->user()->id);

        return redirect()->route('index')->with('success', 'Product created successfully');
    }

    public function index()
    {
        $products = Product::where('status_id', 2)->get();
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

        if ($request->filter == 0) {
            $products = Product::where('status_id', 2)->get();
        } else {
            $products = Product::where('category_id', $request->filter)
                               ->where('status_id', 2)
                               ->get();
        }

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

public function edit(Request $request)
{
    $product = Product::findOrFail($request->id);
    $categories = Category::all();
    return view('edit', compact('product', 'categories'));
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|integer|exists:categories,id',
        'quantity' => 'required|integer|min:1|max:10000',
        'price' => 'required|numeric|min:0|max:1000000'
    ]);

    $product = Product::findOrFail($request->id);
    $product->update([
        'name' => $request->name,
        'category_id' => $request->category,
        'price' => $request->price,
        'quantity' => $request->quantity
    ]);

    Actions::log('updated', $product->id, 'product', $request->user()->id);

    return redirect()->route('products')->with('success', 'Product updated successfully');
}

public function destroy(Request $request)
{
    $product = Product::findOrFail($request->id);
    $orders = Product::where('name', $product->name)->get();
    $product->delete();
    foreach ($orders as $order) {
        $order->delete();
    }
    Actions::log('deleted', null, 'product', $request->user()->id);

    return redirect()->route('products')->with('success', 'Product deleted successfully');
}
// public function delivered(Request $request, $id)
// {
//     $product = Product::findOrFail($id);

//     $existingProduct = Product::where('name', $product->name)->where('status_id', 2)->first();

//     if ($existingProduct) {
//         $existingProduct->increment('quantity', $product->quantity);
//     } else {
//         $product->update(['status_id' => 2]);
//     }

//     Actions::log('delivered', $product->id, 'product', $request->user()->id);

//     $product->delete();

//     return redirect()->route('ordered')->with('success', 'Product marked as delivered successfully');
// }
    
    public function order(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return view('products.order', compact('product'));
    }

    
    public function addOrder(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->id);
        

        Product::create([
            'transaction_id' => 3,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'category_id' => $product->category_id,
            'status_id' => 1
        ]);

        Actions::log('ordered', $product->id, 'product', $request->user()->id);

        return redirect()->route('ordered')->with('success', 'Product ordered successfully');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('show', compact('product', 'categories'));
    }

    
    public function delivered(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $existingProduct = Product::where('name', $product->name)->where('status_id', 2)->first();

        if ($existingProduct) {
            $existingProduct->increment('quantity', $product->quantity);
        } else {
            $product->update(['status_id' => 2]);
        }

        Actions::log('delivered', $product->id, 'product', $request->user()->id);

        $product->delete();

        return redirect()->route('ordered')->with('success', 'Product marked as delivered successfully');
    }

// public function addOrder(Request $request)
// {
//     $request->validate([
//         'quantity' => 'required|integer|min:1'
//     ]);

//     $product = Product::findOrFail($request->id);
    
//     $product->decrement('quantity', $request->quantity);

//     // Assuming there is an Order model to record the order
//     Order::create([
//         'product_id' => $product->id,
//         'quantity' => $request->quantity,
//         'status_id' => 1
//     ]);

//     return redirect()->route('ordered')->with('success', 'Product ordered successfully');
// }
}

