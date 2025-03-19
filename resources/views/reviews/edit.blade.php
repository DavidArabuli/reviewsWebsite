<x-layout>
    <x-slot:heading>
        Edit review {{$review->title}}
    </x-slot:heading>
    <h1>Create a new review</h1>
    <form method="POST" action="/reviews/{{$review->id}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">review title</label>
            <input 
            id="title" 
            name="title" 
            type="text"
            value="{{$review->title}}">
        </div>
        <div class="error">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div>
            <label for="content">content</label>
            <input 
            id="content" 
            name="content" 
            type="text"
            value="{{$review->content}}"
            >
        </div>
        <div class="error">
            @error('content')
                {{$message}}
            @enderror
        </div>
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
        <a href="/reviews/{{$review->id}}">cancel</a>
    </form>
    <form action="/reviews/{{$review->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
       
    
</x-layout>