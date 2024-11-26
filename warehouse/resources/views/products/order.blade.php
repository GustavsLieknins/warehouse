<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold leading-tight text-gray-800">
                        {{ $product->name }}
                    </h3>
                    <form action="{{ route('products.order.form', ['id' => $product->id]) }}" method="POST" class="mt-6">
                        @csrf
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700">
                                How many you wanna order?
                                <input type="number" name="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            </label>
                        </div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

