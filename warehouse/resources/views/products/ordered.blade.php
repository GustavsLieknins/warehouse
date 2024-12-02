<x-app-layout>
    <div class="container mx-auto h-full flex flex-col p-8">
        <h1 class="text-6xl font-extrabold mb-8 text-center text-indigo-600 drop-shadow-lg">Ordered Products</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Quantity</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Price each</th>
                        @if (Auth::user()->role == 1)
                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($orderedProducts as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $product->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $product->quantity }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">${{ $product->price }}</td>
                            @if (Auth::user()->role == 1)
                                <td class="py-3 px-4 text-sm">
                                    <form action="{{ route('products.delivered', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-green-600">Delivered</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('success'))
        <div id="success-alert" class="fixed top-0 right-0 mt-5 mr-5 bg-green-500 text-white font-bold rounded p-4" role="alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').remove();
            }, 3000);
        </script>
    @endif
</x-app-layout>
