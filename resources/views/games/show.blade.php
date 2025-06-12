<x-layout>
    <x-slot:heading>
        Single game page
    </x-slot:heading>
    <h1>hello from single game page!!!</h1>
    
    <x-game-article>
        <x-slot:title>
        This game`s title is {{ $game->title }}
    </x-slot:title>
    <x-slot:steamImage>
        this game`s steam Pic is following
        <img src="{{asset($game->image_path)}}" alt="steam image"></img>
    </x-slot:steamImage>
    <x-slot:description>
        {{$game->description}}
    </x-slot:description>

    {{-- <x-slot:screenshots>
        @foreach($screenshotsArray as $screenshotThumbnail)
        <div>
            <img src="{{$screenshotThumbnail['path_thumbnail']}}" alt="game screenshot" >
        </div>
        @endforeach
    </x-slot:screenshots> --}}

<!-- Swiper container -->


    {{-- <x-slot:screenshots>
    @foreach($screenshots as $screenshot)
        <div>
            <img src="{{ $screenshot['path_thumbnail'] }}" alt="game screenshot">
        </div>
    @endforeach

    <div class="mt-4">
        {{ $screenshots->links() }}
    </div>
</x-slot:screenshots> --}}

    <x-slot:tags>
        this game`s tags:
        @foreach($game->tags as $tag)
            <br>
            <a href="{{route('tags.show', $tag)}}">{{$tag['name']}}</a>
        @endforeach
    </x-slot:tags>
    <x-slot:steam_review_score>
        This reviews score is {{ $game->steam_review_score }}
    </x-slot:steam_review_score>
    <x-slot:steam_id>
        this game`s steam ID is {{ $game->steam_id }}
    </x-slot:steam_id>
    <x-slot:trailer>
        @if ($steamVideoUrl)
        <video width="640" height="360" controls>
            <source src="{{$steamVideoUrl}}" type="video/mp4">
                Does your browser support this video tag?
        </video>
        @else
        <p>No trailer available.</p>    
        @endif
    </x-slot:trailer>

    <x-slot:functional>
        @can('create', \App\Models\Review::class)
        <x-button href="{{route('reviews.create', ['game_id'=>$game->id, 'steam_id' =>$game->steam_id ] )}}">write a review for this game</x-button>
        @endcan 
    
        @can('edit', $game)
        <x-button href='/games/{{$game->id}}/edit'>Edit game</x-button>
        @endcan
    </x-slot:functional>
    </x-game-article>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          @foreach($screenshotsArray as $screenshot)
          <div class="swiper-slide flex justify-center items-center">
            <img src="{{ $screenshot['path_thumbnail'] }}" alt="screenshot"
                 class="rounded-lg max-w-full h-auto object-contain" />
        </div>
          @endforeach
        </div>
        <!-- Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    {{-- <iframe src="https://store.steampowered.com/widget/2187290/" width="646" height="190"></iframe> --}}

</x-layout>