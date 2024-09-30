@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2  text-blue-400  font-bold transition duration-150 ease-in-out'
            : 'px-3 py-2  text-gray-400 hover:text-blue-400 hover:underline transition-colors transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
