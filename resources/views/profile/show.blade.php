<x-layout>
    <x-slot:heading>
        Profile page
    </x-slot:heading>
    <div class="flex flex-col items-center">
    <x-sub-header>All reviews from this author:</x-sub-header>

        <x-avatar src="{{ $user->avatar 
            ? asset('storage/' . $user->avatar) 
            : asset('storage/avatars/avatar.png') }}">></x-avatar>
        
        @auth 
            
            
            <x-nav-link href="{{route('profile.edit', auth()->user())}}">edit avatar</x-nav-link>
            
            @endauth
    
        <div class="ml-3">
    
            @foreach ($reviews as $item)
                <x-link href="{{route('reviews.show', $item->id)}}">{{$item['title']}}</x-link>
            @endforeach
        </div>
    </div>

    
</x-layout>