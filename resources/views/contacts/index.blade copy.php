<x-layout >

    <x-slot:heading>
        Home page  user!
    </x-slot:heading>
    <x-page-header>News and Updates</x-page-header>
    {{-- @foreach ($posts as $post) --}}
    <x-post-preview href="/posts/{{$post->id}}">
        

            <div>{{$post->title}}</div>
            
            @if ($post->screenshots && count($post->screenshots) > 0)
        
            @foreach ($post->screenshots as $screenshot)
                <x-gameImg src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot"></x-gameImg>
            @endforeach
            @else
            <p>No screenshots available.</p>
            @endif
        
    </x-post-preview>
    {{-- @endforeach --}}

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        <x-button href="/posts/create">add a new post</x-button>
        @endcan
    </div>
</x-layout>