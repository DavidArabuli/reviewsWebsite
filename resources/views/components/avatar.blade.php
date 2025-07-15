@props(['src', 'alt' => 'avatar'])

<img 
    class="mt-4 mb-4 w-24 h-24 rounded-full object-cover border border-blue-800 shadow-lg ring" 
    src="{{ $src }}" 
    alt="{{ $alt }}" 
/>
