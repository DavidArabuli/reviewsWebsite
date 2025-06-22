{{-- @props(['name'])

<input 
    name="{{ $name }}"
    id="{{ $attributes->get('id') ?? $name }}"
    {{ $attributes->merge([
        'class' => 'border-2 rounded px-2 py-1 bg-indigo-100 ' . ($errors->has($name) ? 'border-red-500' : 'border-blue-50')
    ]) }}
> --}}
@props(['name', 'type' => 'text'])

<input 
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $attributes->get('id') ?? $name }}"
    value="{{ old($name) }}"
    {{ $attributes->merge([
        'class' => 'border-2 rounded px-2 py-1 bg-indigo-100 ' . ($errors->has($name) ? 'border-red-500' : 'border-blue-50')
    ]) }}
>

