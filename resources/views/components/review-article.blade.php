<div {{$attributes->merge(['class'=>'article'])}}>
    <x-title class="title">
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
    <div class="steamID-div">
    {{ $steamID ?? 'steam id unknown' }}
    </div>
    <br>
    <div class="otherReviews-div">
    {{ $otherReviews ?? 'no other reviews by this author'}}
    </div>
</div>
    
<div class="tags-div">
{{$tags ?? 'no tags available'}}
</div>
<div class="screenshots-div">
{{$screenshots ?? 'no screenshots available'}}
</div>
<div class="functional-div">
{{$functional ?? ''}}
</div>
</div>
