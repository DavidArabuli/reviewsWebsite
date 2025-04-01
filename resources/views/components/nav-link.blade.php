@props(['active' => false])
<a 
class="{{ $active ? 'active' : 'nav-link' }}" 
aria-current="{{ $active ? 'page' : 'false' }}"
{{$attributes}}
>{{$slot}}</a>