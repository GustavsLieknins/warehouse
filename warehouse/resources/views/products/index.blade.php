<style>
    .modal-container {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        border-radius: 10px;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
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
                        <option value="0">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->query('filter') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Category</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Quantity</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Price</th>
                        @if (Auth::user()->role == 1)
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4 text-sm text-gray-900">
                                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="text-blue-600">{{ $product->name }}</a>
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $categories[$product->category_id - 1]->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $product->quantity }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">${{ $product->price }}</td>
                            @if (Auth::user()->role == 1)
                                <td class="py-3 px-4 text-sm text-gray-900">
                                    <span class="text-blue-600"><a href="/edit/?id={{ $product->id }}">Edit</a></span>
                                    <span class="ml-2 text-red-600">
                                        <button type="button" onclick="openModal({{ $product->id }})" class="text-red-600">Delete</button>
                                    </span>
                                    <span class="text-green-600 ml-2"><a href="/order/?id={{ $product->id }}">Order</a></span>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="modal" class="modal-container">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <p>Are you sure you want to delete the product?</p>
                <form action="/delete" method="GET">
                    @csrf
                    <input type="hidden" id="delete-id" name="id">
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md">Yes, delete the product</button>
                </form>
            </div>
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

<script>
    function openModal(id) {
        document.getElementById("modal").style.display = "block";
        document.getElementById("delete-id").value = id;
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("modal")) {
            closeModal();
        }
    }
</script>
