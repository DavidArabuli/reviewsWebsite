<x-layout>
    <x-slot:heading>
        Tag
    </x-slot:heading>
    
    <div class="ml-5">

        <x-title> 
            {{$tag->name}}
            </x-title>
    </div>
    <x-sub-header>
        all games associated with this tag:
    </x-sub-header>
    
    @foreach ($tag->games as $game)
        
        <x-link href="{{route('games.show', ['game' => $game->id])}}">{{$game->title}}</x-link>   
        
    @endforeach
    
    <x-sub-header>
        all reviews associated with this tag:
    </x-sub-header>
    
    
    @foreach ($tag->reviews as $review)
        
        <x-link href="{{route('reviews.show', ['review' => $review->id])}}">{{$review->title}}</x-link>   
        
    @endforeach
        <section class="p-2 mt-3">
            @can('edit', $tag)
                <x-button href="{{route('tags.edit', $tag)}}">Edit tag</x-button>
            @endcan
        </section>
    
    
</x-layout>