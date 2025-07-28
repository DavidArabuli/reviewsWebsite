<x-layout>
    <x-slot:heading>
        Create review
    </x-slot:heading>
    <h1>Create a new review</h1>
    <form class="m-5" method="POST" action="/reviews" enctype="multipart/form-data">
        @csrf
        <x-form-field>
            <div>
                <x-form-label for="title">review title</x-form-label>
                <x-form-input id="title" name="title" type="text"></x-form-input>
                <x-form-error name='title'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="content">review content</x-form-label>
                
                
                {{-- editor --}}
                <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                <div class="min-h-[30rem] overflow-auto border rounded-md">
                    <trix-editor input="content" class="w-full h-full"></trix-editor>
                </div>
                {{-- editor --}}

                <x-form-error name='content'/>
            </div>
        </x-form-field>
        <x-form-field>
            <div>
                <x-form-label for="score">review score</x-form-label>
                <x-form-input id="score" name="score" type="text"></x-form-input>
                <x-form-error name='score'/>
            </div>
        </x-form-field>
        <x-form-field>
    <div>
        <x-form-field>
    <div>
        <x-form-label for="tag">Select a Tag</x-form-label>
        <select id="tag" name="tag" >
            <option value="" selected disabled>Choose a tag...</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <x-form-error name="tag"/>
    </div>
</x-form-field>
    </div>
</x-form-field>
        
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
                const maxSize = 2 * 1024 * 1024;
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
        
        <input type="hidden" name="game_id" value="{{ $game_id }}">
        <input type="hidden" name="steam_id" value="{{ $steam_id }}">
        <x-form-button >Save</x-form-button>
    </form>
</x-layout>