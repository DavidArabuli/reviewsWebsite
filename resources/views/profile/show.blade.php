<x-layout>
    <x-slot:heading>
        Profile page
    </x-slot:heading>
    <div class="flex flex-col items-center">
    <x-sub-header>All reviews from this author:</x-sub-header>

        <x-avatar src="{{ $user->avatar 
            ? asset('storage/' . $user->avatar) 
            : asset('storage/avatars/avatar.png') }}">></x-avatar>
        
        @if(auth()->id() === $user->id)
        <form method="POST" action="{{ route('profile.destroy', $user) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Delete My Account
            </button>
        </form>
        <x-nav-link href="{{route('profile.edit', auth()->user())}}">edit avatar</x-nav-link>
        
        @endif
        
    
        <div class="ml-3">
    
            @foreach ($reviews as $item)
                <x-link href="{{route('reviews.show', $item->id)}}">{{$item['title']}}</x-link>
            @endforeach
        </div>
    </div>

    
</x-layout>