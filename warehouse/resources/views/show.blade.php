<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-lg font-semibold mb-4">Product Details</h2>
            <div class="mb-3">
                <strong>Name:</strong> {{ $product->name }}
            </div>
            <div class="mb-3">
                <strong>Category:</strong> {{ $categories[$product->category_id]->name }}
            </div>
            <div class="mb-3">
                <strong>Quantity:</strong> {{ $product->quantity }}
            </div>
            <div class="mb-3">
                <strong>Price:</strong> ${{ $product->price }}
            </div>
            <div>
                <a href="{{ route('products') }}" class="text-blue-600">Back to Products</a>
            </div>
        </div>
    </div>
</x-app-layout>
