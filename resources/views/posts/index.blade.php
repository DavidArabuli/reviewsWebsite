<x-layout >

    <x-slot:heading>
        Home page  user!
    </x-slot:heading>
    <x-page-header>News and Updates</x-page-header>
    @foreach ($posts as $item)
    <x-blog-article>
        <x-slot:content>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, laudantium nesciunt. Assumenda veniam expedita rem aut, at doloremque corrupti temporibus quia enim, aperiam dicta iure magni sint est sequi modi.</p>
        </x-slot:content>
    </x-blog-article>
    @endforeach

    <div class="m-4">
    
        @can('create', App\Model\Post::class)
        <x-button href="/posts/create">add a new post</x-button>
        @endcan
    </div>
</x-layout>