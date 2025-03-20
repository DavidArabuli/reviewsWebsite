<x-layout>
    <x-slot:heading>
        Single USER page
    </x-slot:heading>
    <h1>hello from single USER page</h1>
    <br>
    this user`s id is {{$user->id}}
    <br>
    this users`s name is {{$user->name}}
    <br>
    this user`s email is {{$user->email}}
    <br>
    
    
</x-layout>