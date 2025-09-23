<article class="m-6 max-w-screen-lg mx-auto px-4 sm:flex sm:flex-col  border border-[rgba(96,165,250,0.48)]  rounded 
shadow-xl/30 ring">
    <x-title class="mt-2 mb-3">
        {{ $title ?? 'Default Title' }}
    </x-title>
    
    <div >
        {{$steamImage ?? 'no steam images available'}}
    </div>
<div class="max-w-[80rem]">
    {{ $description ?? 'Default Content' }}
    
</div>

<div class="info-block">
    <div class="mt-2 mb-2 text-xl font-extrabold text-blue-900 font-mono">
        {{ $steam_review_score ?? 'No score provided' }}

    </div>
    {{-- <div class="steamID-div">
    {{ $steam_id ?? 'steam id unknown' }}
    </div> --}}
</div>
    
<div class="tags-div">
{{$tags ?? 'no tags available'}}
</div>

<div class="mt-6 mb-6 border border-blue-800 rounded shadow-xl/10 ring inline-block w-fit" >
{{$trailer ?? 'no trailer available'}}
</div>
<div class="mt-4 mb-4">
{{$swiper ?? 'no screenshots available'}}
</div>
<div class="functional-div mt-4 mb-4">
{{$functional ?? ''}}
</div>
</article>
