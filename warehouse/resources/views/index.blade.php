<x-app-layout>
    <div class="flex flex-col items-center">
        <div class="mt-20 text-5xl font-bold">
            Inventory Dashboard
        </div>
        <div class="flex flex-row justify-center mt-20">
            <div class="flex flex-col items-center mr-20">
                <p class="text-2xl font-bold">Total Products</p>
                <p class="text-6xl font-bold">{{ $totalProducts }}</p>
            </div>
            <div class="flex flex-col items-center mr-20">
                <p class="text-2xl font-bold">Low Stock Items</p>
                <p class="text-6xl font-bold">{{ $lowStockItems }}</p>
            </div>
            <div class="flex flex-col items-center">
                <p class="text-2xl font-bold">Ordered products</p>
                <p class="text-6xl font-bold">{{ $recentOrders }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

