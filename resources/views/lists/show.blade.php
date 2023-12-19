<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 bg-white">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                {{ $list->name }}
            </h1>
            <section id="Projects"
    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
                @foreach ($list->products()->get() as $task)            
                    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                        <a href={{$task->url}} target="_blank">
                            <img src={{$task->image_url}} alt="Product" class="h-80 w-72 object-contain rounded-t-xl" />
                            <div class="px-4 py-3 w-72">
                               
                                <p class="text-lg font-bold text-black block capitalize">{{$task->name}}</p>
                                <span class="text-gray-400 mr-3 text-xs">{{$task->description}}</span>
                                <div class="flex items-center">
                                    <p class="text-lg font-semibold text-black cursor-auto my-3">{{$task->price}} €</p>
                                    
                                    <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </section>
        </div>
        
    </div>
</x-guest-layout>