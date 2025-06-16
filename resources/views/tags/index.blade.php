<x-layout>
    <x-slot:heading>
        tags page
    </x-slot:heading>
    <x-title >
        <h1 class="mt-4 ml-4">All Tags</h1>
    </x-title>
    <div class="mt-4 ml-4 ">

        @foreach ($tags as $item)
            <x-tag href="/tags/{{$item['id']}}"> 
                {{$item['name']}}
            </x-tag>
        @endforeach
    </div>

 <br>
 @can('edit', $tag)
 <a href="{{route('tags.create')}}">create new tag</a>
 <br>
 @endcan
    
</x-layout>