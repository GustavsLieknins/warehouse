<x-app-layout>
    <div>
        <div>
            Inventory Dashboard
        </div>
        <div>
            <div>
                <p>Total Products</p>
                <p>{{ $totalProducts }}</p>
            </div>
            <div>
                <p>Low Stock Items</p>
                <p>{{ $lowStockItems }}</p>
            </div>
            <div>
                <p>Recent Orders</p>
                <p>{{ $recentOrders }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
