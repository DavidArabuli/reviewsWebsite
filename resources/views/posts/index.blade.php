<x-layout >

    <x-slot:heading>
        Home page  user!
    </x-slot:heading>
    <x-page-header>News and Updates</x-page-header>
    <article class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4 bg-amber-400">

        @foreach ($posts as $post)
        <x-post-preview href="/posts/{{$post->id}}">
            
    
                <x-title class="mb-3">{{$post->title}}</x-title>
                <p class="text-base line-clamp-4">
                        {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($post['content'])), 300) }}
                </p>
                @if ($post->screenshots && count($post->screenshots) > 0)
            
                @foreach ($post->screenshots as $screenshot)
                    <x-gameImg src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot"></x-gameImg>
                @endforeach
                @else
                <p>No screenshots available.</p>
                @endif
            
        </x-post-preview>
        @endforeach
    </article>

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        <x-button href="/posts/create">add a new post</x-button>
        @endcan
    </div>
</x-layout>