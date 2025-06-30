<x-layout>
    <x-slot:heading>
        Profile page
    </x-slot:heading>
    <x-sub-header>All reviews from this author:</x-sub-header>
    <div class="ml-3">

        @foreach ($reviews as $item)
            <x-link href="{{route('reviews.show', $item->id)}}">{{$item['title']}}</x-link>
        @endforeach
    </div>
    
</x-layout>