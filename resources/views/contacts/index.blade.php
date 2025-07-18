<x-layout >

    <x-slot:heading>
        Home page  user!
    </x-slot:heading>
    <x-page-header>Contacts and team</x-page-header>
    {{-- @foreach ($posts as $post) --}}
    {{-- there will be only one contact post atm --}}
    @if($post)
    <x-post-article>
        

            <x-slot:title>{{$post->title}}</x-slot:title>
            <x-slot:content>
            <p>{!!$post->content!!}</p>
            </x-slot:content>
            @if ($post->screenshots && count($post->screenshots) > 0)
        
            @foreach ($post->screenshots as $screenshot)
            <x-slot:screenshots>
                <x-gameImg class="max-w-[10rem]" src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot"></x-gameImg>
            </x-slot:screenshots>
            @endforeach
            @else
            <p>No screenshots available.</p>
            @endif
        
    </x-post-article>
    @endif
    {{-- @endforeach --}}

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        <x-button href="/contacts/create">add a new post</x-button>
        @endcan
    </div>
    <x-page-header>Our team</x-page-header>
    <div>
        @foreach($team as $member)
        <x-link href="{{route('profile.show', $member->id)}}">{{$member['name']}} : {{$member->is_admin ? 'admin' : 'editor'}}</x-link> 
        @endforeach
    </div>
    
</x-layout>