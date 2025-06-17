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
    <article class="flex flex-col items-center">

        @foreach ($reviews as $item)
        <x-review-preview href="/reviews/{{ $item['id'] }}">
                
        <div
            class="absolute inset-0 w-full h-full bg-contain opacity-10 "
            style="background-image: url('{{ asset($item->game->image_path) }}');">
        </div>
        <div class="relative z-10 flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <x-title>{{ $item['title'] }}</x-title>
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-400 text-black text-md font-bold shrink-0">
                    {{ $item['score'] }}
                </div>
            </div>
            
            <div class="text-sm text-gray-700">
                From: {{ $item->user->name }}
            </div>
            
    
            <p class="text-base leading-snug text-gray-900">
                {{ Str::limit(strip_tags($item['content']), 300) }}
            </p>
        </div>
        </x-review-preview>
        @endforeach
    </article>
            

    <div class="mt-2">
        {{ $reviews->appends(request()->query())->links('components.pagination') }}
    </div>
        <div>
            {{-- {{ $reviews->appends(request()->query())->links() }} --}}
            

        </div>
    
</x-layout>