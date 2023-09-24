@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 px-1 pt-1 border-b-2 border-indigo-400 active:bg-opacity-25 dark:border-indigo-600  '
            : 'flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
