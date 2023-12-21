<x-app-layout>
    <x-slot name="header">
        <h2 class="font-thin text-xl leading-tight">
            <a href="{{ route('lists.index') }}">{{__('Lists')}}</a> / 
            <a href="{{ route('products.index',$list->id) }}">{{$list->name}}</a> / 
            <span class="font-semibold capitalize">{{ $product->name }}</span>
        </h2>
    </x-slot>
    <div>
        <x-out-box>     
            <x-box width="max-w-xl">
                <form method="post" action="{{ route('products.update', ['id' => $list->id, 'product' =>  $product->id]) }}" class="mt-6 space-y-6" >
                    @csrf
                    @method('PUT')
                    
                        

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea-input id="description" name="description" type="textarea" class="mt-1 block w-full"  autofocus autocomplete="description" >
                            {{ old('description', $product->description) }}
                        </x-textarea-input>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>
                    
                    <div>
                        <x-input-label for="url" :value="__('Product Url')" />
                        <x-text-input id="url" name="url" type="url" class="mt-1 block w-full" :value="old('url', $product->url)"  autofocus autocomplete="url" />
                        <x-input-error class="mt-2" :messages="$errors->get('url')" />
                    </div>

                    <div>
                        <x-input-label for="image_url" :value="__('Image Url')" />
                        <x-text-input id="image_url" name="image_url" type="url" class="mt-1 block w-full" :value="old('image_url',  $product->image_url)"  autofocus autocomplete="image_url" />
                        <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
                    </div>
                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $product->price)"  autofocus autocomplete="price" />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>
            </x-box>
        </x-out-box>
    </div>
</x-app-layout>