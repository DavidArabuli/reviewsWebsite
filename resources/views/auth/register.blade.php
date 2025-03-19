<x-layout>
    <x-slot:heading>
        Registration
    </x-slot:heading>
    <h1>Register as a new author</h1>
    <form method="POST" action="/register">
        @csrf
        <x-form-field>
            <div>
                <x-form-label for="name">your name</x-form-label>
                <x-form-input id="name" name="name" type="text"></x-form-input>
                <x-form-error name='name'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="email"> email</x-form-label>
                <x-form-input id="email" name="email" type="email"></x-form-input>
                <x-form-error name='email'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="password"> password</x-form-label>
                <x-form-input id="password" name="password" type="password"></x-form-input>
                <x-form-error name='password'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="password_confirmation"> password confirmation</x-form-label>
                <x-form-input id="password_confirmation" name="password_confirmation" type="password"></x-form-input>
                <x-form-error name='password_confirmation'/>
            </div>
        </x-form-field>
        
        <x-form-button >Register</x-form-button>
        <a href="/" >Cancel</a>
    </form>

       
    
</x-layout>