<x-layout>
    <x-slot:heading>
        Create review
    </x-slot:heading>
    <h1>Create a new review</h1>
    <form method="POST" action="/reviews" enctype="multipart/form-data">
        @csrf
        <x-form-field>
            <div>
                <x-form-label for="title">review title</x-form-label>
                <x-form-input id="title" name="title" type="text"></x-form-input>
                <x-form-error name='title'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="content">review content</x-form-label>
                <x-form-input id="content" name="content" type="text"></x-form-input>
                <x-form-error name='content'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="score">review score</x-form-label>
                <x-form-input id="score" name="score" type="text"></x-form-input>
                <x-form-error name='score'/>
            </div>
        </x-form-field>
        <x-form-field>
    <div>
        <x-form-field>
    <div>
        <x-form-label for="tag">Select a Tag</x-form-label>
        <select id="tag" name="tag" >
            <option value="" selected disabled>Choose a tag...</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <x-form-error name="tag"/>
    </div>
</x-form-field>
    </div>
</x-form-field>
<x-form-field>
            <div>
                <x-form-label for="screenshots">Upload Screenshots</x-form-label>
                <input type="file" name="screenshots[]" id="screenshots" multiple accept="image/*">
                <x-form-error name='screenshots'/>
            </div>
        </x-form-field>
        
        <input type="hidden" name="game_id" value="{{ $game_id }}">
        <input type="hidden" name="steam_id" value="{{ $steam_id }}">
        <x-form-button >Save</x-form-button>
    </form>

       
    
</x-layout>