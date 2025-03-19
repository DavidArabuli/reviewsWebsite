<x-layout>
    <x-slot:heading>
        Log in
    </x-slot:heading>
    <h1>Login</h1>
    <form method="POST" action="/login">
        @csrf
        
        <x-form-field>
            <div>
                <x-form-label for="email"> email</x-form-label>
                <x-form-input id="email" name="email" type="email" :value="old('email')"></x-form-input>
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
        
        
        <x-form-button >Login</x-form-button>
        <a href="/" >Cancel</a>
    </form>

       
    
</x-layout>