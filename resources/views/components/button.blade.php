@props([
    'type'=>'button',
    'href'=>null,
])
@if ($href)
<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'inline-flex text-center text-justify p-1 border bg-emerald-100 border-emerald-400 hover:bg-emerald-800 hover:text-white rounded shadow-xl/30 ring cursor-pointer m-2']) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex text-center text-justify p-1 border bg-emerald-100 border-emerald-400 hover:bg-emerald-800 hover:text-white rounded shadow-xl/30 ring cursor-pointer m-2']) }}>
    {{ $slot }}
</button>
@endif


{{-- <a href="{{ $href }}" class="p-1 border bg-emerald-100 border-emerald-400 hover:bg-emerald-800 hover:text-white rounded 
shadow-xl/30 ring cursor-pointer m-2">{{$slot}}</a> --}}