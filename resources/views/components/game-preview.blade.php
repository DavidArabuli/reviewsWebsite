{{-- <div {{$attributes->merge(['class'=>'game-preview'])}}>{{$slot}}</div> --}}
<a href="{{ $href }}" class="block bg-indigo-50 mt-1 border border-red-500 p-4 hover:bg-indigo-100 cursor-pointer max-w-full">
    {{ $slot }}
</a>