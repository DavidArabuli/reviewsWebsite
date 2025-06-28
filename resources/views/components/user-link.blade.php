@props(['user'])
<a 
href="{{route('profile.show', $user)}}"
{{$attributes->merge([
    'class'=>'text-blue-600 hover:underline'
])}}>
{{$user->name}}
</a>