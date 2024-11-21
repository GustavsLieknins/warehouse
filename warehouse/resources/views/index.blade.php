<x-app-layout>
    <div class="flex flex-col items-center bg-gray-100 p-10">
        <div class="mt-20 text-5xl font-bold">
            Inventory Dashboard
        </div>
        <div class="flex flex-row justify-center mt-20">
            <a href="{{ route('products') }}">
                <div class="flex flex-col items-center mr-20 bg-white p-10 rounded-md shadow-md">
                    <p class="text-2xl font-bold">Total Products</p>
                    <p class="text-6xl font-bold">{{ $totalProducts }}</p>
                </div>
            </a>
            <a href="{{ route('lowStock') }}">
                <div class="flex flex-col items-center mr-20 bg-white p-10 rounded-md shadow-md">
                    <p class="text-2xl font-bold">Low Stock Items</p>
                    <p class="text-6xl font-bold">{{ $lowStockItems }}</p>
                </div>
            </a>
            <a href="{{ route('ordered') }}">
                <div class="flex flex-col items-center bg-white p-10 rounded-md shadow-md">
                    <p class="text-2xl font-bold">Ordered products</p>
                    <p class="text-6xl font-bold">{{ $recentOrders }}</p>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>

