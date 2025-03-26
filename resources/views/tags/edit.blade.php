<x-layout>
    <x-slot:heading>
        Edit tag {{$tag->title}}
    </x-slot:heading>
    <h1>Create a new tag</h1>
    <form method="POST" action="/tags/{{$tag->id}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">tag title</label>
            <input 
            id="title" 
            name="title" 
            type="text"
            value="{{$tag->title}}">
        </div>
        <div class="error">
            @error('title')
                {{$message}}
            @enderror
        </div>
        {{-- <div>
            <label for="content">content</label>
            <input 
            id="content" 
            name="content" 
            type="text"
            value="{{$tag->content}}"
            >
        </div>
        <div class="error">
            @error('content')
                {{$message}}
            @enderror
        </div>
        <div>
            <label for="score">score</label>
            <input 
            id="score" 
            name="score" 
            type="text"
            value="{{$tag->score}}"
            >
        </div>
        <div class="error">
            @error('score')
                {{$message}}
            @enderror
        </div> --}}
        {{-- <div class="error">

            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                       <li>{{$error}}</li> 
                    @endforeach
                </ul>
            @endif
        </div> --}}
        <button type="submit" form="delete-form">DELETE</button>
        <button type="submit">update</button>
        <a href="/tags/{{$tag->id}}">cancel</a>
    </form>
    <form action="/tags/{{$tag->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
       
    
</x-layout>