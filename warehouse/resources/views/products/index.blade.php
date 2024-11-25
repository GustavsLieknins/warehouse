<style>
    @media (max-width: 425px) {
        .container {
            padding: 0 1rem;
        }
        .flex {
            flex-direction: column;
            align-items: flex-start;
        }
        .flex > * {
            width: 100% !important;
            margin-bottom: 1rem;
        }
        .flex > *:last-child {
            margin-bottom: 0;
        }
        table {
            width: 100%;
        }
        thead {
            display: none;
        }
        tbody tr {
            display: block;
        }
        tbody td {
            display: block;
            width: 100%;
        }
        tbody td:not(:last-child) {
            border-bottom: 1px solid #e2e8f0;
        }
        tbody td:first-child {
            background-color: #f7fafc;
            border-radius: 0.5rem 0.5rem 0 0;
            padding: 0.5rem 1rem;
        }
        tbody td:last-child {
            border-radius: 0 0 0.5rem 0.5rem;
            padding: 0.5rem 1rem;
        }
    }
</style>

<x-app-layout class="h-screen">
    <div class="container mx-auto h-full flex flex-col p-8">
        <h1 class="text-6xl font-extrabold mb-8 text-center text-indigo-600 drop-shadow-lg">Products</h1>
        <form action="{{ route('products') }}" method="GET" class="mb-6">
            @csrf
            <div class="flex items-start justify-center">
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
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
    @foreach ($products as $product)
    <tr class="hover:bg-gray-100">
        <td class="py-3 px-4 text-sm text-gray-900">{{ $product->name }}</td>
        <td class="py-3 px-4 text-sm text-gray-900">{{ $categories[$product->category_id - 1]->name }}</td>
        <td class="py-3 px-4 text-sm text-gray-900">{{ $product->quantity }}</td>
        <td class="py-3 px-4 text-sm text-gray-900">${{ $product->price }}</td>
        <td class="py-3 px-4 text-sm text-gray-900">
            <span class="text-blue-600">
            <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a>
            </span>
            <span class="ml-2 text-red-600">
                <a href="">Delete</a>
            </span>
        </td>
    </tr>
    @endforeach
</tbody>
        </table>
    </div>
</x-app-layout>

