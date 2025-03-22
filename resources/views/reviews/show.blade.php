<x-layout>
    <x-slot:heading>
        Single review page
    </x-slot:heading>
    <h1>hello from single review page</h1>
    <br>
    this article`s id is {{$review->id}}
    <br>
    this review`s title is {{$review->title}}
    <br>
    this review`s content is {{$review->content}}
    <br>
    <br>
    this review`s score is {{$review->score}}
    <br>
    @can('edit', $review)
    <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
    @endcan
    
</x-layout>