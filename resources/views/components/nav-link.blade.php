@props(['active' => false])
<a
    class="{{ $active
        ? 'rounded-md bg-gray-900 px-4 py-3 text-base sm:text-sm text-white font-medium'
        : 'nav-link rounded-md px-4 py-3 text-base sm:text-sm text-gray-700 hover:bg-gray-700 hover:text-white font-medium'
    }}"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}>
    {{ $slot }}
</a>