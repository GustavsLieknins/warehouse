<style>
    table {
        width: 100%;
    }

    @media only screen and (max-width: 767px) {
        table {
            border: 0;
        }

        table thead {
            display: none;
        }

        table tr {
            margin-bottom: 10px;
            display: block;
        }

        table td {
            display: block;
            text-align: right;
            font-size: 13px;
            border-bottom: 1px solid #ddd;
        }

        table td:last-child {
            border-bottom: 0;
        }

        table td:before {
            content: attr(data-label);
            float: left;
            text-transform: uppercase;
            font-weight: bold;
        }
    }
</style>

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
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="ID">ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="Action">Action</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="Product ID">Product ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="Entity">Entity</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="User ID">User ID</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="Created At">Created At</th>
                                <th class="px-6 py-2 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" data-label="Updated At">Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($actions as $action)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="ID">{{ $action->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="Action">{{ $action->action }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="Product ID">{{ $action->product_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="Entity">{{ $action->entity }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="User ID">{{ $action->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="Created At">{{ $action->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200" data-label="Updated At">{{ $action->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

