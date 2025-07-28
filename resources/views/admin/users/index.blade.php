<x-layout>
    <x-slot:heading>
        ALL USERS
    </x-slot:heading>
    <h3>authors and editors</h3>
    
        @foreach ($users as $user)
        <x-link class="max-w-[84rem] min-w-[64rem]" href="{{ route('admin.users.show', $user) }}">
        <div class="flex flex-col items-center">
            <x-avatar src="{{ $user->avatar 
        ? asset('storage/' . $user->avatar) 
        : asset('storage/avatars/avatar.png') }}">></x-avatar>
            <p>{{$user['email']}}</p> 
            <p>{{$user['name']}}</p> 
        </div>
        </x-link>
        @endforeach

        <div class="mt-2">
        {{ $users->appends(request()->query())->links('components.pagination') }}
    </div>
    
    
    
    
</x-layout>