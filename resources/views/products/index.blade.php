<x-app-layout>
    <x-slot name="header">
        <h2 class="font-thin text-xl leading-tight">
            <a href="{{ route('lists.index') }}">{{ __('Lists') }}</a> /
            <span class="font-semibold">{{ $list->name }}</span>
        </h2>
    </x-slot>

    <div>
        <x-out-box>
            <x-box>

                <div class="block mb-8">
                    <a href="{{ route('products.create', $list->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('Add Product') }}</a>
                    <a href="{{ route('lists.show', $list->id) }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-orange-500  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500  transition ease-in-out duration-150">{{ __('Share') }}</a>
                </div>

                <table class="min-w-full text-left text-sm font-light  w-full dark:text-gray-100">
                    <thead class="text-center sm:text-left border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" width="100" class="hidden md:table-cell px-6 py-4 ">#</th>
                            <th scope="col" class="px-6 py-4">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" width="200" class="px-6 py-3 ">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($products as $task)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 font-medium hidden md:table-cell">
                                    {{ $task->id }}</td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    <a
                                        href="{{ route('products.edit',['id' => $list->id, 'product' =>  $task->id]) }}">
                                        {{ $task->name }}
                                    </a>
                                </td>

                                <td class="hitespace-nowrap px-6 py-4">
                                    <a href="{{ route('products.edit',['id' => $list->id, 'product' =>  $task->id]) }}"
                                        class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">{{ __('Edit') }}</a>
                                    <form class="inline-block"
                                        action="{{ route('products.destroy',['id' => $list->id, 'product' =>  $task->id]) }}"
                                        method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                            value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-box>
        </x-out-box>

    </div>
</x-app-layout>
