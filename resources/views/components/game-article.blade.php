<div {{$attributes->merge(['class'=>'article'])}}>
    <x-title class="title">
        {{ $title ?? 'Default Title' }}
    </x-title>
    
    <div class="steamImage-div">
        {{$steamImage ?? 'no steam images available'}}
    </div>
<div class="content">
    {{ $description ?? 'Default Content' }}
    
</div>

<div class="info-block">
    <div class="score-div">
        {{ $steam_review_score ?? 'No score provided' }}

    </div>
    <br>
    
    <br>
    <div class="steamID-div">
    {{ $steam_id ?? 'steam id unknown' }}
    </div>
    <br>
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
