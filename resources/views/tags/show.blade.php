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
        <a href="{{route('games.show', ['game' => $game->title])}}">{{$game->title}}</a>   
        </li>
    @endforeach

    {{-- @can('edit', $tag)
    <x-button href='/tags/{{$tag->id}}/edit'>Edit tag</x-button>
    @endcan --}}
    
</x-layout>