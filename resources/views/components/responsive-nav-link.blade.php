@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full cursor-pointer px-2 py-1 rounded-md  text-white font-medium bg-blue-400 transition-colors'
            : 'block w-full px-3 py-2 border-l-4 border-transparent text-start text-base font-medium  text-blue-400 hover:bg-blue-100 hover:border-blue-300 focus:outline-none  focus:ring-1 transition duration-150 ease-in-out';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
