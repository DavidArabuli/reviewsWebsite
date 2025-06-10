<x-layout>
    <x-slot:heading>
        Single tag page
    </x-slot:heading>
    <h1>hello from single tag page</h1>
    
    this tag`s title is {{$tag->name}}
    <br>
    all games associated with this tag
    
    @foreach ($tag->games as $game)
        <li>
        <a href="{{route('games.show', ['game' => $game->id])}}">{{$game->title}}</a>   
        </li>
    @endforeach
    <br>
    all reviews associated with this tag
    
    @foreach ($tag->reviews as $review)
        <li>
        <a href="{{route('reviews.show', ['review' => $review->id])}}">{{$review->title}}</a>   
        </li>
    @endforeach
        <br>
        <br>
    @can('edit', $tag)
        <x-button href="{{route('tags.edit', $tag)}}">Edit tag</x-button>
    @endcan
    
    
</x-layout>