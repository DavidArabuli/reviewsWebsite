<article class="m-6 max-w-screen-lg mx-auto px-4 sm:flex sm:flex-col  border border-[rgba(96,165,250,0.48)]  rounded 
shadow-xl/30 ring">
<x-title class="title">
    {{ $title ?? 'Default Title' }}
</x-title>
<div class="content">
    {{ $content ?? 'Default Content' }}
    
</div>
<div class="screenshots-div">
    {{$screenshots ?? 'no screenshots available'}}
</div>

<div class="functional-div mt-4 mb-4 border border-amber-600">
    {{$functional ?? ''}}
</div>
</article>