<x-layout>
    <x-slot:heading>
        Add game
    </x-slot:heading>
    <h1>Add new game to DB</h1>
    <form method="POST" action="/games">
        @csrf
        <x-form-field>
            <div>
                <x-form-label for="title">Game Steam app id</x-form-label>
                <x-form-input id="steam_id" name="steam_id" type="number"></x-form-input>
                <x-form-error name='steam_id'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="title">Game title</x-form-label>
                <x-form-input id="title" name="title" type="text"></x-form-input>
                <x-form-error name='title'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="tags">Game tags</x-form-label>
                @foreach($allTags as $tag)
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                @endforeach
                <x-form-error name='tags'/>
            </div>
        </x-form-field>
        
        <x-form-button >Save</x-form-button>
    </form>
    
</x-layout>