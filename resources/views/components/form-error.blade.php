@props(['name'])

<div class="alert-danger">
            @error($name)
                {{$message}}
            @enderror
        </div>