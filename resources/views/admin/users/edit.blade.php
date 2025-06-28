<x-layout>
    <x-slot:heading>
        Single USER EDIT page
    </x-slot:heading>
    <h1>EDIT USER</h1>
    <br>
    this user`s id is {{$user->id}}
    <br>
    this users`s name is {{$user->name}}
    <br>
    this user`s email is {{$user->email}}
    <br>
    this user`s role is {{$user->is_editor}}
    <br>
    <x-form-field >
        <form method="POST" action="/admin/users/{{$user->id}}">
        
            @csrf
            @method('PATCH')
            <x-form-label> user is an editor</x-form-label>
            <input type="hidden" name="role" value="0">

            <input name='role' type='checkbox' value="1" {{ $user->is_editor ? 'checked' : '' }}/>
            <x-form-button>submit</x-form-button>
        </form>
    </x-form-field>
    {{-- <x-form-field>
    <form method="POST" action="/admin/users/{{$user->id}}">
        @csrf
        @method('PATCH')
        <x-form-label>Edit role</x-form-label>
        <x-form-input name="role" type="checkbox" value="1" {{ $user->is_editor ? 'checked' : '' }} />
        <x-form-button>Submit</x-form-button>
    </form>
</x-form-field> --}}
    
    
</x-layout>