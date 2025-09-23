<article class="m-6 max-w-screen-lg mx-auto px-4 sm:flex sm:flex-col  border border-[rgba(96,165,250,0.48)]  rounded 
shadow-xl/30 ring">
<x-title class="title mt-2 mb-2">
    {{ $title ?? 'Default Title' }}
</x-title>
<div class="content">
    {{ $content ?? 'Default Content' }}
    
</div>
<div class="screenshots-div">
    {{$screenshots ?? ''}}
</div>

<div class="functional-div mt-4 mb-4">
    {{$functional ?? ''}}
</div>
</article>