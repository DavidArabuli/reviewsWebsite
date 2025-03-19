<x-layout>
    <x-slot:heading>
        Create review
    </x-slot:heading>
    <h1>Create a new review</h1>
    <form method="POST" action="/reviews">
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
        
        <x-form-button >Save</x-form-button>
    </form>

       
    
</x-layout>