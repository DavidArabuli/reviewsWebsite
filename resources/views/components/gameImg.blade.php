@props(['src', 'alt' => 'steam image'])

<img 
    {{ $attributes->merge(['class' => 'mt-4 mb-4 border border-blue-800 rounded shadow-xl/30 ring']) }}
    src="{{ $src }}" 
    alt="{{ $alt }}" 
/>
