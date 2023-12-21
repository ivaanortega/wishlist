<x-guest2-layout>

    <div class="min-h-screen">
        <div class="text-center p-10">

            <h1 class="text-3xl dark:text-white">{{ $list->name }}</h1>
        </div>

        <!-- ✅ Grid Section - Starts Here 👇 -->
        <div >
        <section id="List"
            class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

            @foreach ($list->products()->get() as $task)
                <div
                    class="w-72 bg-white dark:bg-gray-800 shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">

                    <a href="{{ $task->url ? $task->url : '#' }}" target="_blank">
                        @if($task->image_url)
                            <img src={{ $task->image_url }} alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        @endif
                        <div class="px-4 py-3 w-72 text-black dark:text-white">

                            <p class="text-lg font-bold  block capitalize">{{ $task->name }}</p>
                            <span class="text-gray-400 mr-3 text-xs">{{ $task->description }}</span>
                            <div class="flex items-center">
                                @if ($task->price && $task->price > 0)
                                    <p class="text-lg font-semibold cursor-auto my-3">{{ $task->price }} €</p>
                                @endif

                                <div class="ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </section>
        </div>
        <!-- Spacing -->
        <div class="h-20"></div>
        
    </div>
    <footer class="flex justify-center items-center h-16 bg-gray-200 dark:bg-gray-800">
        @if (auth()->check())
            <!-- User is authenticated, show create new list button -->
            <a href="{{ route('products.create', $list->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600">
                {{ __('Add More Products') }}
            </a>
        @else
            <!-- User is not authenticated, show login button -->
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600">
                {{ __('Login') }}
            </a>
        @endif
    </footer>
</x-guest2-layout>
