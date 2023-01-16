@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block py-2.5 px-4 rounded bg-violet-100 transition duration-150 ease-in-out'
                : 'block py-2.5 px-4 rounded hover:bg-violet-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} >
    {{ $slot }}
</a>