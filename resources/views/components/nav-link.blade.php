@props(['active' => false])
<a 
class="{{ $active ? 'active nav-link' : 'nav-link' }}" 
aria-current="{{ $active ? 'page' : 'false' }}"
{{$attributes}}
>{{$slot}}</a>