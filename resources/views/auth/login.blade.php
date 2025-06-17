<x-layout>
    <x-slot:heading>
        Log in
    </x-slot:heading>
    <article>
        
        <form method="POST" action="/login" class="m-2">
            @csrf
            
            <h1 class="font-bold mb-1">Login:</h1>
            <x-form-field>
                <div class="flex flex-row justify-between items-center">

                    <x-form-label for="email">email:</x-form-label>
                    <x-form-input id="email" name="email" type="email" :value="old('email')"></x-form-input>
                </div>
                    <x-form-error name='email'/>
                
            </x-form-field>
            {{-- <x-form-field>
            
                    <x-form-label for="password">password:</x-form-label>
                    <x-form-input id="password" name="password" type="password"></x-form-input>
                    <x-form-error name='password'/>
            
            </x-form-field> --}}
            <x-form-field>
                <div class="flex flex-row justify-between items-center">
                    <x-form-label for="password">password:</x-form-label>
                    <x-form-input id="password" name="password" type="password" />
                </div>
                <x-form-error name='password' />
            </x-form-field>
            
            
            
            <x-form-button >Login</x-form-button>
            <a class="cursor-pointer" href="/" >Cancel</a>
        </form>
    </article>

       
    
</x-layout>