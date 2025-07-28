<x-layout>
    <x-slot:heading>
        Profile page
    </x-slot:heading>
    <div class="flex flex-col items-center">
    <x-sub-header>edit your avatar:</x-sub-header>

        <x-avatar src="{{ $user->avatar 
            ? asset('storage/' . $user->avatar) 
            : asset('storage/avatars/avatar.png') }}">></x-avatar>
        
    
        <div class="ml-3">
            <form id="formAvatar" method="POST" action="/users/profile/{{ $user->id }}">
            @csrf
            @method('PATCH')
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
        <!-- Avatar Preview + Cropping -->
<div class="mt-4">
    <div class="w-64 h-64 border relative">
        <img id="avatar-preview" class="w-full h-full object-contain" alt="Preview">
    </div>
</div>

<input type="hidden" name="cropped_avatar" id="cropped-avatar-input">
<x-button type="submit">update</x-button>
<x-button   href="/profile/{{$user->id}}">cancel</x-button>

</div>
</form>

</div>
<script>
            function handleAvatarChange(input) {
                const fileList = input.files;
                const maxFiles = 1;
                const maxSize = 2 * 1024 * 1024; 
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
        
<script>
const form = document.getElementById('formAvatar');
const avatarInput = document.getElementById('avatar');
const avatarPreview = document.getElementById('avatar-preview');
const croppedInput = document.getElementById('cropped-avatar-input');

let cropper;

avatarInput.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        avatarPreview.src = event.target.result;

        if (cropper) cropper.destroy();

        cropper = new Cropper(avatarPreview, {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 1,
        });
    };
    reader.readAsDataURL(file);
});

form.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.set('_method', 'PATCH'); 

    if (cropper) {
        cropper.getCroppedCanvas({
            width: 300,
            height: 300
        }).toBlob(function (blob) {
            formData.set('avatar', blob, 'cropped-avatar.jpg');
            submitForm(formData);
        });
    } else {
        submitForm(formData);
    }
});

function submitForm(formData) {
    for (const [key, value] of formData.entries()) {
        console.log(`${key}:`, value);
    }

    fetch(form.action, {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json' 
    },
    body: formData
}).then(async response => {
    const data = await response.json();
    
    if (!response.ok) {
        if (data.errors) {
            showValidationErrors(data.errors);
        } else {
            alert("Unknown error occurred.");
        }
    } else {
        console.log("Success:", data);
        alert(data.message);

        window.location.href = data.redirect_url;
    }
}).catch(error => {
        console.error("Fetch error:", error);
        alert("Network error. Check console for details.");
    });
}

function showValidationErrors(errors) {
    for (const field in errors) {
        const messages = errors[field].join('\n');
        alert(`${field}: ${messages}`);
    }
}
</script>
</x-layout>