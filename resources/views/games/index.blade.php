<x-layout>
    <x-slot:heading>
        Games page
    </x-slot:heading>
    <article class="flex flex-col items-center">
    <x-page-header>games in our database</x-page-header>

    {{-- <form method="GET" action="{{ route('reviews.index') }}">
        <label for="sort">Sort by Score:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Highest First</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Lowest First</option>
        </select>
    </form> --}}

        @foreach ($games as $game)
        <x-game-preview href="/games/{{$game['id']}}">
            <div class = "flex flex-col md:flex-row gap-10 justify-between">
                <x-title >
                    <h1 class="min-w-[10rem]">
                        {{$game['title']}}
                    </h1>
                </x-title>
                <div class="flex-3 max-w-[40rem]">
                    <p class="text-base line-clamp-4">
                        {{$game['description']}}
                    </p>
                </div>
                <div class="flex-none">
                    <img class="h-28" src="{{asset($game->image_path)}}" alt="steam image"></img>
                </div>
            </div>
        </x-game-preview>
                
        @endforeach
        <div class="m-4">
    
            @can('edit', $game)
            <x-button href="/games/create">add a new game</x-button>
            @endcan
        </div>
    </article>

    <div class="mt-2">
        {{ $games->links('components.pagination') }}
    </div>
    
</x-layout>