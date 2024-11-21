<x-app-layout class="h-screen">
    <div class="container mx-auto h-full flex flex-col justify-center p-8">
        <h1 class="text-6xl font-extrabold mb-8 text-center text-indigo-600 drop-shadow-lg">Products</h1>
        <form action="{{ route('products') }}" method="GET" class="mb-6">
            @csrf
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <label for="category" class="mr-4">Category:</label>
                    <select name="filter" id="filter" class="border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="available" {{ request()->query('filter') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="ordered" {{ request()->query('filter') == 'ordered' ? 'selected' : '' }}>Ordered</option>
                        <option value="low_stock" {{ request()->query('filter') == 'low_stock' ? 'selected' : '' }}>Low stock</option>
                    </select>
                </div>
            </div>
        </form>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Category</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Quantity</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Price</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $product)
                <tr class="hover:bg-gray-100">
                    <td class="py-3 px-4 text-sm text-gray-900">{{ $product->name }}</td>
                    <td class="py-3 px-4 text-sm text-gray-900">{{ $categories[$product->category_id - 1]->name }}</td>
                    <td class="py-3 px-4 text-sm text-gray-900">{{ $product->quantity }}</td>
                    <td class="py-3 px-4 text-sm text-gray-900">${{ $product->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

