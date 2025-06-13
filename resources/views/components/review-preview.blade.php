{{-- <div class="bg-red-200 mt-1 flex flex-col items-start border border-red-500">
    {{$slot}}
</div> --}}
<a href="{{ $href }}" class="block bg-red-200 mt-1 flex flex-col items-start border border-red-500 p-4 hover:bg-red-300 cursor-pointer">
    {{ $slot }}
</a>

