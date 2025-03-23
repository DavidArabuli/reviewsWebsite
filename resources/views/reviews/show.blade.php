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
    <br>
    this review`s steam ID is {{$review->steam_id}}
    <br>
    <img src="{{$gameImage}}" alt="no image">
    <br>
    @foreach ($review->tags as $tag)
        <li>
         <a href="{{route('reviews.index', ['tag' => $tag->name])}}">{{$tag->name}}</a>   
        </li>
    @endforeach
    @can('edit', $review)
    <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
    @endcan
    
</x-layout>