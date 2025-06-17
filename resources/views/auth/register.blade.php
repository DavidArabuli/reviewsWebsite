<x-layout>
    <x-slot:heading>
        Registration
    </x-slot:heading>
    <article class="m-2">

        <form method="POST" action="/register">
            <h1 class="font-bold mb-1">Register as a new author</h1>
            @csrf
            <x-form-field>
            
                    <x-form-label for="name">your name:</x-form-label>
                    <x-form-input id="name" name="name" type="text"></x-form-input>
                    <x-form-error name='name'/>
                
            </x-form-field>
            <x-form-field>
                
                    <x-form-label for="email">email:</x-form-label>
                    <x-form-input id="email" name="email" type="email"></x-form-input>
                    <x-form-error name='email'/>
                
            </x-form-field>
            <x-form-field>
                
                    <x-form-label for="password">password:</x-form-label>
                    <x-form-input id="password" name="password" type="password"></x-form-input>
                    <x-form-error name='password'/>
                
            </x-form-field>
            <x-form-field>
                
                    <x-form-label for="password_confirmation">confirm password:</x-form-label>
                    <x-form-input id="password_confirmation" name="password_confirmation" type="password"></x-form-input>
                    <x-form-error name='password_confirmation'/>
                
            </x-form-field>
            
            <x-form-button >Register</x-form-button>
            <a href="/" >Cancel</a>
        </form>
    </article>

       
    
</x-layout>