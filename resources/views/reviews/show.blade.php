<x-layout>
    <x-slot:heading>
        Single review page
    </x-slot:heading>
    <x-review-article>

        <h1>hello from single review page</h1>
        <br>
        this article`s id is {{$review->id}}
        <br>
        this review`s title is {{$review->title}}
        <br>
        {{-- this review`s content is {{$review->content}} --}}
        {{-- rich text editor --}}
        <div>{!! $review->content !!}</div>
        <br>
        <br>
        this review`s score is {{$review->score}}
        <br>
        this review`s author is {{$review->user->name}}
        <br>
        Check all of his reviews: 
        <a href="{{route('profile.show', $user)}}">Check all of his reviews </a>
        <br>
        this review`s steam ID is {{$review->steam_id}}
        <br>
        <img src="{{asset($image_path)}}" alt="steam image"></img>
        <br>
        @foreach ($review->tags as $tag)
            <li>
             <a href="{{route('reviews.index', ['tag' => $tag->name])}}">{{$tag->name}}</a>   
            </li>
        @endforeach
    
        @if ($review->screenshots && count($review->screenshots) > 0)
        @foreach ($review->screenshots as $screenshot)
            <img src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot">
        @endforeach
    @else
        <p>No screenshots available.</p>
    @endif
    
    
        @can('edit', $review)
        <x-button href='/reviews/{{$review->id}}/edit'>Edit review</x-button>
        @endcan
    </x-review-article>
    
</x-layout>