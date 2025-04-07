<x-layout>
    <x-slot:heading>
        Single review page
    </x-slot:heading>
    <x-article>

        <x-slot:title>
        This reviews title is {{ $review->title }}
    </x-slot:title>
    <x-slot:steamImage>
        <img class="steamImage" src="{{asset($image_path)}}" alt="steam image"></img>
    </x-slot:steamImage>
    <x-slot:content>
        {!! $review->content !!}
    </x-slot:content>

    <x-slot:score>
        This reviews score is {{ $review->score }}
    </x-slot:score>

    <x-slot:author>
        this review`s author is {{ $review->user->name }}
    </x-slot:author>
    
    <x-slot:steamID>
        this review`s steam ID is {{ $review->steam_id }}
    </x-slot:steamID>
        <x-slot:otherReviews>
            Check all of his reviews: 
        <a href="{{route('profile.show', $user)}}">Check all of his reviews </a>
    </x-slot:otherReviews>

    <x-slot:tags>
        @foreach ($review->tags as $tag)
            <li>
            <a href="{{route('reviews.index', ['tag' => $tag->name])}}">{{$tag->name}}</a>   
            </li>
        @endforeach
    </x-slot:tags>
        <br>

    <x-slot:screenshots>
            @if ($review->screenshots && count($review->screenshots) > 0)
            @foreach ($review->screenshots as $screenshot)
                <img src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot">
            @endforeach
            @else
            <p>No screenshots available.</p>
            @endif
    </x-slot:screenshots>
    
    
        <x-slot:functional>
        @can('edit', $review)
        <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
        @endcan
        </x-slot:functional>
    </x-article>
    
</x-layout>