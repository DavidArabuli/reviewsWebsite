{{-- <div class="bg-red-200 mt-1 flex flex-col items-start border border-red-500">
    {{$slot}}
</div> --}}
{{-- <a href="{{ $href }}" class="bg-indigo-50 mt-1 flex flex-col  border border-red-500 p-4 hover:bg-indigo-100 cursor-pointer relative overflow-hidden max-w-[75rem] ">
    {{ $slot }}
</a> --}}

{{-- <a href="{{ $href }}"
   class="bg-indigo-50 mt-4 flex flex-col border border-red-500 p-4
          hover:bg-indigo-100 cursor-pointer relative overflow-hidden
          w-full max-w-5xl md:w-4/5 rounded-lg">
    {{ $slot }}
</a> --}}

<a href="{{ $href }}"
class="bg-indigo-50 mt-4 flex flex-col border border-pink-900 p-4
      hover:bg-indigo-100 cursor-pointer relative overflow-hidden 
        outline-1 outline-offset-1 outline-pink-900
        w-full max-w-5xl md:w-4/5 rounded-lg shadow-xl">
    {{ $slot }}
</a>