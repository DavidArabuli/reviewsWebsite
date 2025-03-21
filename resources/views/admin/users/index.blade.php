<x-layout>
    <x-slot:heading>
        ALL USERS
    </x-slot:heading>
    <h1>hello from ALL USERS page</h1>
    <h3>authors and editors</h3>
    <p>
        @foreach ($users as $user)
        <x-nav-link href="{{ route('admin.users.show', $user) }}">
        <div>
            <p>{{$user['email']}}</p> 
            <p>{{$user['name']}}</p> 
        </div>
        </x-nav-link>
        @endforeach
    </p>
    
    
    
</x-layout>