<x-app-layout>
    <x-slot name="header">
        <h2 class="font-thin text-xl leading-tight">
            <a href="{{ route('lists.index') }}">{{__('Lists')}}</a> / <span class="font-semibold">{{ __('Create List') }}</span>
        </h2>

    </x-slot>

    <div>
        <x-out-box>     
            <x-box width="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Create List') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Define a name to a new list") }}
                    </p>
                </header>

                <form method="post" action="{{ route('lists.store') }}" class="mt-6 space-y-6"> 
                    @csrf
                    
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', '')" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create') }}</x-primary-button>
                    </div>
              
                </form>

                
            </x-box>
        </x-out-box>
    </div>
</x-app-layout>