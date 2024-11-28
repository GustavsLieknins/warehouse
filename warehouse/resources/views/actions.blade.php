<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Product ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Entity</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($actions as $action)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->action }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->product_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->entity }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $action->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
