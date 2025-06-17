{{-- <div {{$attributes->merge(['class'=>'game-preview'])}}>{{$slot}}</div> --}}
{{-- <a href="{{ $href }}" class="block bg-indigo-50 mt-1 border border-red-500 p-4 hover:bg-indigo-100 cursor-pointer max-w-7xl">
    {{ $slot }}
</a> --}}
<a href="{{ $href }}"
class="bg-indigo-50 mt-4 flex flex-col border border-gray-400 p-4
      hover:bg-indigo-100 cursor-pointer relative overflow-hidden 
        outline-1 outline-offset-1 outline-gray-400
        w-full max-w-5xl md:w-4/5 rounded-lg shadow-xl">
    {{ $slot }}
</a>