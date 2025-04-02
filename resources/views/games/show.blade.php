<x-layout>
    <x-slot:heading>
        Single game page
    </x-slot:heading>
    <h1>hello from single game page</h1>
    <x-game-article>

        @if ($steamVideoUrl)
        <video width="640" height="360" controls>
            <source src="{{$steamVideoUrl}}" type="video/mp4">
                Does your browser support this video tag?
        </video>
        @else
        <p>No trailer available.</p>    
        @endif
        <p>steam video url:</p>
        <p>{{$steamVideoUrl}}</p>
        <br>
        this game`s id is {{$game->id}}
        <br>
    
        this game`s title is {{$game->title}}
        <br>
        this game`s steam ID is {{$game->steam_id}}
        <br>
        <br>
        this game`s steam Pic is following
        <img src="{{asset($game->image_path)}}" alt="steam image"></img>
        <br>
        <br>
        this game`s tags:
        @foreach($game->tags as $tag)
            <br>
            <a href="{{route('tags.show', $tag)}}">{{$tag['name']}}</a>
        @endforeach
        <br>
        @can('create', \App\Models\Review::class)
        <x-button href="{{route('reviews.create', ['game_id'=>$game->id, 'steam_id' =>$game->steam_id ] )}}">write a review for this game</x-button>
        @endcan 
    
        @can('edit', $game)
        <x-button href='/games/{{$game->id}}/edit'>Edit game</x-button>
        @endcan
    </x-game-article>

    {{-- @foreach ($game->tags as $tag)
        <li>
         <a href="{{route('games.index', ['tag' => $tag->name])}}">{{$tag->name}}</a>   
        </li>
    @endforeach --}}
    {{-- @can('edit', $review)
    <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
    @endcan --}}
    
</x-layout>