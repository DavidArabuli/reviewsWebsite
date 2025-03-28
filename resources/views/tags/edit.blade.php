<x-layout>
    <x-slot:heading>
        Edit tag {{$tag->title}}
    </x-slot:heading>
    <h1>Create a new tag</h1>
    <form method="POST" action="/tags/{{$tag->id}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="tag">tag tag</label>
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
        
        <button type="submit" form="delete-form">DELETE</button>
        <button type="submit">update</button>
        <a href="/tags/{{$tag->id}}">cancel</a>
    </form>
    <form action="/tags/{{$tag->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
       
    
</x-layout>