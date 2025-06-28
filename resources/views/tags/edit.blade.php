<x-layout>
    <x-slot:heading>
        Edit tag {{$tag->title}}
    </x-slot:heading>
    <h1>Create a new tag</h1>
    <form method="POST" action="/tags/{{$tag->id}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="tag">tag</label>
            <input 
            id="tag" 
            name="tag" 
            type="text"
            value="{{$tag->name}}">
        </div>
        <div class="error">
            @error('tag')
                {{$message}}
            @enderror
        </div>
        
        <x-button class="bg-red-300 hover:bg-red-700 hover:text-white" type="submit" form="delete-form">delete</x-button>
        <x-button type="submit">update</x-button>
        <x-button href="/tags/{{$tag->id}}">cancel</x-button>
    </form>
    <form action="/tags/{{$tag->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
       
    
</x-layout>