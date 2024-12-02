<x-app-layout>
    <style>
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f3f4f6;
            padding: 2.5rem;
        }
        .dashboard-title {
            margin-top: 5rem;
            font-size: 3rem;
            font-weight: bold;
        }
        .card-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 5rem;
            
        }
        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* margin-right: 5rem; */
            margin: 15px;
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 0.5rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card:last-child {
            margin-right: 0;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-value {
            font-size: 3.75rem;
            font-weight: bold;
        }
        @media (max-width: 425px) {
            .dashboard-title {
                margin-top: 2rem;
            }
            .card-container {
                flex-direction: column;
                margin-top: 25px;
                margin-bottom: 25px;
            }
            .card {
                margin-right: 0;
                margin-bottom: 2.5rem;
            }
            .card:last-child {
                margin-bottom: 0;
            }
            .dashboard-container 
            {
                padding: 20px;
                padding-top: 0px;
                text-align: center;
            }
        }
    </style>
    <div class="dashboard-container">
        <div class="dashboard-title">
            Inventory Dashboard
        </div>
        <div class="card-container">
            <a href="{{ route('products') }}">
                <div class="card">
                    <p class="card-title">Total Products</p>
                    <p class="card-value">{{ $totalProducts }}</p>
                </div>
            </a>
            <a href="{{ route('lowStock') }}">
                <div class="card">
                    <p class="card-title">Low Stock Items</p>
                    <p class="card-value">{{ $lowStockItems }}</p>
                </div>
            </a>
            <a href="{{ route('ordered') }}">
                <div class="card">
                    <p class="card-title">Ordered Products</p>
                    <p class="card-value">{{ $recentOrders }}</p>
                </div>
            </a>
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
    </div>
</x-app-layout>

