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
            {{-- <label for="content">content</label>
            <input 
            id="content" 
            name="content" 
            type="text"
            value="{{$review->content}}"
            > --}}
            <input id="content" type="hidden" name="content" value="{{ $review->content }}">
            <trix-editor input="content"></trix-editor>
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
            value="{{$review->score}}"
            >
        </div>
        <div class="error">
            @error('score')
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
        <x-button class="bg-red-300 hover:bg-red-700 hover:text-white" type="submit" form="delete-form">delete</x-button>
        <x-button type="submit">update</x-button>
        <x-button   href="/reviews/{{$review->id}}">cancel</x-button>
    </form>
    <form action="/reviews/{{$review->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
    
</x-layout>