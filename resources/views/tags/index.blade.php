<x-layout>
    <x-slot:heading>
        tags page
    </x-slot:heading>
    <h1>hello from tags page</h1>
    
    @foreach ($tags as $item)
        <li> 
            <a href="/tags/{{$item['id']}}">

                {{$item['name']}}
            </a>
            
        </li>
        
        <br>
            
        @endforeach

 <br>
 @can('edit', $tag)
 <a href="{{route('tags.create')}}">create new tag</a>
 <br>
 @endcan
    
</x-layout>