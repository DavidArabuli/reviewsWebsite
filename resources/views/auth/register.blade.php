<x-layout>
    <x-slot:heading>
        Registration
    </x-slot:heading>
    <article class="m-2">

        <form method="POST" action="/register" enctype="multipart/form-data">
            <h1 class="font-bold mb-1">Register as a new author</h1>
            @csrf
            <x-login-field>
            
                    <x-form-label for="name">your name:</x-form-label>
                    <x-form-input id="name" name="name" type="text"></x-form-input>
                    <x-form-error name='name'/>
                
            </x-login-field>
            <x-login-field>
                
                    <x-form-label for="email">email:</x-form-label>
                    <x-form-input id="email" name="email" type="email"></x-form-input>
                    <x-form-error name='email'/>
                
            </x-login-field>
            <x-login-field>
                
                    <x-form-label for="password">password:</x-form-label>
                    <x-form-input id="password" name="password" type="password"></x-form-input>
                    <x-form-error name='password'/>
                
            </x-login-field>
            <x-login-field>
                
                    <x-form-label for="password_confirmation">confirm password:</x-form-label>
                    <x-form-input id="password_confirmation" name="password_confirmation" type="password"></x-form-input>
                    <x-form-error name='password_confirmation'/>
                
            </x-login-field>
            {{-- ************* avatar ************* --}}
            <x-form-field>
            <div>
                <x-form-label for="avatar">Upload avatar</x-form-label>
        
                <div class="flex items-center space-x-4">
                
                    <input
                        type="file"
                        name="avatar"
                        id="avatar"
                        multiple
                        accept="image/*"
                        class="hidden"
                        onchange="handleAvatarChange(this)"
                    >

        
                    
                    <label for="avatar" class="cursor-pointer px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Choose Files
                    </label>
        
                    
                    <span id="file-chosen" class="text-sm text-gray-600">No files chosen</span>
                </div>
        
                <x-form-error name='avatar'/>
            </div>
        </x-form-field>
        
        <script>
            function handleAvatarChange(input) {
                const fileList = input.files;
                const maxFiles = 1;
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                const output = document.getElementById('file-chosen');
        
                if (fileList.length > maxFiles) {
                    alert(`You can only upload ${maxFiles} file for your avatar.`);
                    input.value = '';
                    output.textContent = 'No files chosen';
                    return;
                }
        
                for (const file of fileList) {
                    if (file.size > maxSize) {
                        alert(`${file.name} is too large. Max size is 2MB.`);
                        input.value = '';
                        output.textContent = 'No files chosen';
                        return;
                    }
        
                    if (!file.type.startsWith("image/")) {
                        alert(`${file.name} is not an image file.`);
                        input.value = '';
                        output.textContent = 'No files chosen';
                        return;
                    }
                }
        
                output.textContent = Array.from(fileList).map(f => f.name).join(', ');
            }
        </script>

            <x-form-button >Register</x-form-button>
            <a href="/" >Cancel</a>
        </form>
    </article>

       
    
</x-layout>