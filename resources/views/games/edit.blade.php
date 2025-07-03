<x-layout>
    <x-slot:heading>
        Add game
    </x-slot:heading>
    <h1>Add new game to DB</h1>
    <form method="POST" action="/games/{{$game->id}}">
        @csrf
        @method('PATCH')
        <x-form-field>
            <div>
                <x-form-label for="steam_id">Game Steam app id</x-form-label>
                <x-form-input value="{{$game->steam_id}}" id="steam_id" name="steam_id" type="number"></x-form-input>
                <x-form-error name='steam_id'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="title">Game title</x-form-label>
                <x-form-input value="{{$game->title}}" id="title" name="title" type="text"></x-form-input>
                <x-form-error name='title'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="tags">Game tags</x-form-label>
                @foreach($allTags as $tag)
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ $game->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach
                <x-form-error name='tags'/>
            </div>
        </x-form-field>
        
        
        <x-button class="bg-red-300 hover:bg-red-700 hover:text-white" type="submit" form="delete-form">delete</x-button>
        <x-button type="submit">update</x-button>
        <x-button   href="/games/{{$game->id}}">cancel</x-button>

    </form>
    <form action="/games/{{$game->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>

       
    
</x-layout>