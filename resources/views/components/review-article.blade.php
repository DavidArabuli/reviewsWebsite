<article class="m-6 max-w-screen-lg mx-auto px-4 sm:flex sm:flex-col  border border-[rgba(96,165,250,0.48)]  rounded 
shadow-xl/30 ring">
    <x-title class="title mt-2">
        {{ $title ?? 'Default Title' }}
    </x-title>
    
    <div class="steamImage-div">
        {{$steamImage ?? 'no steam images available'}}
    </div>
<div class="content">
    {{ $content ?? 'Default Content' }}
    
</div>

<div class="info-block">
    <div class="score-div">
        {{ $score ?? 'No score provided' }}

    </div>
    <br>
    <div class="author-div">
    {{ $author ?? 'anonymous' }}
    </div>
    <br>
    {{-- <div class="steamID-div">
    {{ $steamID ?? 'steam id unknown' }}
    </div> --}}
    <br>
    <div class="otherReviews-div mb-2">
    {{ $otherReviews ?? 'no other reviews by this author'}}
    </div>
</div>
    
<div class="tags-div">
{{$tags ?? 'no tags available'}}
</div>
<div class="screenshots-div">
{{$screenshots ?? 'no screenshots available'}}
</div>
<div class="functional-div mt-4 mb-4">
{{$functional ?? ''}}
</div>
</article>
