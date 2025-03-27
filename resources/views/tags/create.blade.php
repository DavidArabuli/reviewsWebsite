<x-layout>
    <x-slot:heading>
        Create tag
    </x-slot:heading>
    <h1>Create a new tag</h1>
    <form method="POST" action="/tags">
        @csrf
        <x-form-field>
            <div>
                <x-form-label for="tag">tag tag</x-form-label>
                <x-form-input id="tag" name="tag" type="text"></x-form-input>
                <x-form-error name='tag'/>
            </div>
        </x-form-field>
        {{-- <x-form-field>
            <div>
                <x-form-label for="content">tag content</x-form-label>
                <x-form-input id="content" name="content" type="text"></x-form-input>
                <x-form-error name='content'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="score">tag score</x-form-label>
                <x-form-input id="score" name="score" type="text"></x-form-input>
                <x-form-error name='score'/>
            </div>
        </x-form-field>
        
        <input type="hidden" name="game_id" value="{{ $game_id }}">
        <input type="hidden" name="steam_id" value="{{ $steam_id }}"> --}}
        <x-form-button >Save</x-form-button>
    </form>

       
    
</x-layout>