@props(['width' => 'max-w-7xl'])

<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="{{$width}}">
        {{$slot}}
    </div>
</div>
