<x-layout>
    <x-slot:heading>
        Edit review {{$post->title}}
    </x-slot:heading>
   
    <form method="POST" action="/posts/{{$post->id}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">post title</label>
            <input 
            id="title" 
            name="title" 
            type="text"
            value="{{$post->title}}">
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
            <input id="content" type="hidden" name="content" value="{{ $post->content }}">
            <trix-editor input="content"></trix-editor>
        </div>
        <div class="error">
            @error('content')
                {{$message}}
            @enderror
        </div>
        
        
        <x-button class="bg-red-300 hover:bg-red-700 hover:text-white" type="submit" form="delete-form">delete</x-button>
        <x-button type="submit">update</x-button>
        <x-button   href="/posts/{{$post->id}}">cancel</x-button>
    </form>
    <form action="/posts/{{$post->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
       
    
</x-layout>