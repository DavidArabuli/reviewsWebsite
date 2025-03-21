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
    <br>
    this user`s role is {{$user->is_editor}}
    <br>
    
    <x-nav-link href="{{route('admin.users.edit', $user)}}">edit user</x-nav-link>
</x-layout>