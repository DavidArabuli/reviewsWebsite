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

{{-- @props(['active' => false])
<a 
class="{{ $active ? 
'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' 
: 
'nav-link rounded-md  px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-700 hover:text-white' 
}}" 
aria-current="{{ $active ? 'page' : 'false' }}"
{{$attributes}}
>{{$slot}}</a> --}}