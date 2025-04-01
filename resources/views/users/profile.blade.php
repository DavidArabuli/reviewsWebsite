<x-layout>
    <x-slot:heading>
        Profile page
    </x-slot:heading>
    <h1>hello from PROFILE page</h1>
  
    @foreach ($reviews as $item)
        <li>  
            <a href="{{route('reviews.show', $item->id)}}">{{$item['title']}}</a>
            
        </li>
<br>
        @endforeach
    
</x-layout>