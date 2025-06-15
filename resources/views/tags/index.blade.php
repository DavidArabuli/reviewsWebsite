<x-layout>
    <x-slot:heading>
        tags page
    </x-slot:heading>
    <h1>hello from tags page</h1>
    
    @foreach ($tags as $item)
        <x-tag href="/tags/{{$item['id']}}"> 
            {{$item['name']}}
        </x-tag>
    @endforeach

 <br>
 @can('edit', $tag)
 <a href="{{route('tags.create')}}">create new tag</a>
 <br>
 @endcan
    
</x-layout>