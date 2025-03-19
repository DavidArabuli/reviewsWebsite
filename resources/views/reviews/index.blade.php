<x-layout>
    <x-slot:heading>
        Reviews page
    </x-slot:heading>
    <h1>hello from reviews page</h1>
    @foreach ($reviews as $item)
        <li>read our 
            <a href="/reviews/{{$item['id']}}">

                {{$item['title']}}
            </a>
            <span>from: {{$item->author->name}}</span>
        </li>
        <li>content: {{$item['content']}}</li>
        <br>
            
        @endforeach

        <div>
            {{$reviews->links()}}
        </div>
    
</x-layout>