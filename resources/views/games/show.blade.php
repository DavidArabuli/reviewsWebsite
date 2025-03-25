<x-layout>
    <x-slot:heading>
        Single game page
    </x-slot:heading>
    <h1>hello from single game page</h1>
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
    @can('create', \App\Models\Review::class)
    <x-button href="{{route('reviews.create', ['game_id'=>$game->id, 'steam_id' =>$game->steam_id ] )}}">write a review for this game</x-button>
    @endcan 

    {{-- @foreach ($game->tags as $tag)
        <li>
         <a href="{{route('games.index', ['tag' => $tag->name])}}">{{$tag->name}}</a>   
        </li>
    @endforeach --}}
    {{-- @can('edit', $review)
    <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
    @endcan --}}
    
</x-layout>