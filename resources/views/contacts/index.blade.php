<x-layout >

    <x-slot:heading>
        Contacts
    </x-slot:heading>
    <x-page-header>Contacts and team</x-page-header>
    @if($post)
    <a class="cursor-pointer" href="{{ route('contacts.show', $post) }}">
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
        </a>
    @endif

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        @if(!$post)
        <x-button href="/contacts/create">Add a new post</x-button>
        @endif
        @endcan
    </div>

    <x-page-header>Our team</x-page-header>
    <div>
        @foreach($team as $member)
        <x-link href="{{route('profile.show', $member->id)}}">{{$member['name']}} : {{$member->is_admin ? 'admin' : 'editor'}}</x-link> 
        @endforeach
    </div>
    
</x-layout>