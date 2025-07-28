<x-layout>
    <x-slot:heading>
        Edit review {{$post->title}}
    </x-slot:heading>
    
    <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">post title</label>
            <input 
            id="title" 
            name="title" 
            type="text"
            value="{{$post->title}}">
        </div>
        <div class="error">
            @error('title')
                {{$message}}
            @enderror
        </div>
        <div>
            <input id="content" type="hidden" name="content" value="{{ $post->content }}">
            <trix-editor input="content"></trix-editor>
        </div>
        <div class="error">
            @error('content')
                {{$message}}
            @enderror
        </div>
        <x-form-field>
            <div>
                <x-form-label for="screenshots">Upload Screenshots</x-form-label>
        
                <div class="flex items-center space-x-4">
                
                    <input
                        type="file"
                        name="screenshots[]"
                        id="screenshots"
                        multiple
                        accept="image/*"
                        class="hidden"
                        onchange="handleScreenshotsChange(this)"
                    >

        
                    
                    <label for="screenshots" class="cursor-pointer px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Choose Files
                    </label>
        
                    
                    <span id="file-chosen" class="text-sm text-gray-600">No files chosen</span>
                </div>
        
                <x-form-error name='screenshots'/>
            </div>
        </x-form-field>
        
        <script>
            function handleScreenshotsChange(input) {
                const fileList = input.files;
                const maxFiles = 5;
                const maxSize = 2 * 1024 * 1024; // 2MB
                const output = document.getElementById('file-chosen');
        
                if (fileList.length > maxFiles) {
                    alert(`You can only upload up to ${maxFiles} files.`);
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
        <script>
            document.addEventListener("trix-file-accept", function(event) {
                event.preventDefault();
                alert("File uploads are disabled. Please use the upload field below.");
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const content = @json(old('content'));
                if (content) {
                    document.querySelector("trix-editor").editor.loadHTML(content);
                }
            });
        </script>
        
        
        <x-button class="bg-red-300 hover:bg-red-700 hover:text-white" type="submit" form="delete-form">delete</x-button>
        <x-button type="submit">update</x-button>
        <x-button   href="/contacts/{{$post->id}}">cancel</x-button>
    </form>
    <form action="/contacts/{{$post->id}}" method="POST" id="delete-form" class="hidden">      
        @csrf
        @method('DELETE')
    </form>
</x-layout>