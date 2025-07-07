<x-layout >

    <x-slot:heading>
        Home page  user!
    </x-slot:heading>
    <x-page-header>News and Updates</x-page-header>
    @foreach ($posts as $item)
    <x-post-preview href="/posts/{{$item->id}}">
        

            <div>{{$item->title}}</div>
            
        
    </x-post-preview>
    @endforeach

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        <x-button href="/posts/create">add a new post</x-button>
        @endcan
    </div>
</x-layout>