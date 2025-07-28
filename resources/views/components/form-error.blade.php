@props(['name'])

<div class="text-red-600 text-xs mt-2">
        @error($name)
            {{$message}}
        @enderror
</div>