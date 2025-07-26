{{-- {{dd($post->screenshots)}} --}}
<x-layout>
    <x-slot:heading>
        Single post page
    </x-slot:heading>
    <x-post-article>

    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>
    
    <x-slot:content>
        
        {!! $post->content !!}
    </x-slot:content>

    
    <x-slot:screenshots>
        @if ($post->screenshots && count($post->screenshots) > 0)
        
            @foreach ($post->screenshots as $screenshot)
                <x-gameImg src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot"></x-gameImg>
            @endforeach
            @else
            <p>No screenshots available.</p>
            @endif
    </x-slot:screenshots>
    
    
        <x-slot:functional>
        @can('update', $post)
        <x-button href='/contacts/{{$post->id}}/edit'>Edit post</x-button>
        @endcan
        </x-slot:functional>
    </x-post-article>
    
</x-layout>
