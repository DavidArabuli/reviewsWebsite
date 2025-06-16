<x-layout>
    <x-slot:heading>
        Single tag page
    </x-slot:heading>
    <h1>hello from single tag page</h1>
    
    <x-title> 
        {{$tag->name}}
        </x-title>
    <br>
    all games associated with this tag
    
    @foreach ($tag->games as $game)
        
        <x-link href="{{route('games.show', ['game' => $game->id])}}">{{$game->title}}</x-link>   
        
    @endforeach
    
    all reviews associated with this tag
    
    @foreach ($tag->reviews as $review)
        
        <x-link href="{{route('reviews.show', ['review' => $review->id])}}">{{$review->title}}</x-link>   
        
    @endforeach
        <br>
        <br>
    @can('edit', $tag)
        <x-button href="{{route('tags.edit', $tag)}}">Edit tag</x-button>
    @endcan
    
    
</x-layout>