@props(['active' => false])
<a 
class="{{ $active ? 'active' : 'default_link' }}" 
aria-current="{{ $active ? 'page' : 'false' }}"
{{$attributes}}
>{{$slot}}</a>