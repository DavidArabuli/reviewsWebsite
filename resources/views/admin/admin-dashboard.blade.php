<x-layout>
    <x-slot:heading>
        Admin Dashboard
    </x-slot:heading>
    <h1>admin functions</h1>
    

    <h3>authors and editors</h3>
    <p>
        @foreach ($users as $user)
        <x-nav-link href="user/{{$user->id}}">
        <div>
            <p>{{$user['email']}}</p> 
            <p>{{$user['name']}}</p> 
        </div>
        </x-nav-link>
        @endforeach
    </p>
    <h3>editors:</h3>
    <p>
        @foreach ($editors as $editor)
        <li>{{$editor['email']}}</li>
        @endforeach
    </p>
    
</x-layout>