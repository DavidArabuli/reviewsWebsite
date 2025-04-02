<x-layout>
    <x-slot:heading>
        Games page
    </x-slot:heading>
    <h1>hello from Games page</h1>

    {{-- <form method="GET" action="{{ route('reviews.index') }}">
        <label for="sort">Sort by Score:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Highest First</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Lowest First</option>
        </select>
    </form> --}}
    
    @foreach ($games as $game)
        <li>read our 
            <a href="/games/{{$game['id']}}">

                {{$game['title']}}
            </a>
        </li>
        
        <br>
            
        @endforeach
    <br>
    <p>=====</p>
    @can('edit', $game)
    <a href="/games/create">add a new game</a>
    <p>=====</p>
    <br>
    @endcan
    
</x-layout>