<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Lists') }}
        </h2>
    </x-slot>

    <div>
        <x-out-box>
            <x-box>
                <div class="block mb-8">
                    <a href="{{ route('lists.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('Add List') }}</a>
                    
                </div>

                <table class="min-w-full text-left text-sm font-light  w-full dark:text-gray-100">
                    <thead class="text-center sm:text-left border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col"  width="100" class="table-cell sm:table-cell px-6 py-4 ">#</th>
                            <th scope="col" class="px-6 py-4">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $task)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 font-medium hidden sm:table-cell" >{{ $task->id }}</td>

                                <td class="whitespace-nowrap px-6 py-4">
                                    <a href="{{ route('products.index', $task->id) }}" >
                                        {{ $task->name }}
                                    </a>
                                </td>
                            
                                <td class="hitespace-nowrap px-6 py-4">
                                    <a href="{{ route('lists.show', $task->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2  dark:text-gray-100">{{ __('View') }}</a>
                                    <a href="{{ route('products.index', $task->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">{{ __('Edit') }}</a>
                                    <form class="inline-block" action="{{ route('lists.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
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