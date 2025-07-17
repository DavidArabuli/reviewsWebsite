{{-- <a href="{{ $href }}" class="bg-amber-200 mt-1 flex flex-row items-center justify-center border border-red-500 p-4 rounded-md hover:bg-amber-500 cursor-pointer max-w-[12rem]">
    {{ $slot }}
</a> --}}
<a href="{{ $href }}"
class="bg-indigo-100 mt-1 flex justify-center text-center border border-indigo-700 outline outline-offset-1 p-2 rounded m-2  hover:bg-indigo-500 hover:text-white cursor-pointer max-w-[16rem] shadow-xl/30 ring">
   {{ $slot }}
</a>
{{-- <a href="{{ $href }}"
   class="bg-amber-200 mt-1 flex items-center justify-center text-center border border-red-500 p-4 rounded-md hover:bg-amber-500 cursor-pointer max-w-[14rem]">
   {{ $slot }}
</a> --}}