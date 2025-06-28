<article class="m-4">
    <x-title>
        {{ $title ?? 'Default Title' }}
    </x-title>
    
    <div >
        {{$steamImage ?? 'no steam images available'}}
    </div>
<div class="max-w-[80rem]">
    {{ $description ?? 'Default Content' }}
    
</div>

<div class="info-block">
    <div class="mt-2 text-xl font-extrabold text-blue-900 font-mono">
        {{ $steam_review_score ?? 'No score provided' }}

    </div>
    <div class="steamID-div">
    {{ $steam_id ?? 'steam id unknown' }}
    </div>
</div>
    
<div class="tags-div">
{{$tags ?? 'no tags available'}}
</div>
<div class="screenshots-div">
{{$screenshots ?? 'no screenshots available'}}
</div>
<div class="mt-4 mb-4 border border-blue-800 rounded shadow-xl/30 ring inline-block" >
{{$trailer ?? 'no trailer available'}}
</div>
<div >
{{$swiper ?? 'no screenshots available'}}
</div>
<div class="functional-div mt-4">
{{$functional ?? ''}}
</div>
</article>
