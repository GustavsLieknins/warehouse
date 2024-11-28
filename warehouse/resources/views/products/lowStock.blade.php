<x-app-layout>
    <div class="container mx-auto h-full flex flex-col p-8">
        <h1 class="text-6xl font-extrabold mb-8 text-center text-indigo-600 drop-shadow-lg">Low Stock Products</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Quantity</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Price</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($lowStockItems as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $item->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $item->quantity }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">${{ $item->price }}</td>
                            <td class="text-green-600 ml-2"><a href="/order/?id={{ $item->id }}">Order</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
