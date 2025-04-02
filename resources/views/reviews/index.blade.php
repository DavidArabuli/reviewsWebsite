<x-layout>
    <x-slot:heading>
        Reviews page
    </x-slot:heading>
    <h1>hello from reviews page</h1>

    <form method="GET" action="{{ route('reviews.index') }}">
        @if(request('tag'))
        <input type="hidden" name="tag" value="{{ request('tag') }}">
        @endif
        <label for="sort">Sort by Score:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Highest First</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Lowest First</option>
        </select>
    </form>
    
    @foreach ($reviews as $item)
        <x-review-card>
            <li>read our 
                <a href="/reviews/{{$item['id']}}">
    
                    {{$item['title']}}
                </a>
                A game rated as: {{$item['score']}}, 
                <span>from: {{$item->user->name}}</span>
            </li>
            <li>content: {!!$item['content']!!}</li>
            <br>
        </x-review-card>
            
        @endforeach

        <div>
            {{ $reviews->appends(request()->query())->links() }}
        </div>
    
</x-layout>