@props(['name'])

<div class="error">
            @error($name)
                {{$message}}
            @enderror
        </div>