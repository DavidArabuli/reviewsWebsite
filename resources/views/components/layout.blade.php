<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    
    {{-- editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    {{-- editor end --}}
    <title>{{$heading}}</title>
</head>
<body class="body">
    <nav class="nav">
        
        <x-nav-link href='/' :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href='/reviews' :active="request()->is('reviews')">reviews</x-nav-link>
        <x-nav-link href='/contact' :active="request()->is('contact')">contact</x-nav-link>
        <x-nav-link href='/games' :active="request()->is('games')">all games</x-nav-link>
        <x-nav-link href='/tags' :active="request()->is('tags')">all tags</x-nav-link>

        @guest 
        <x-nav-link href='/login' :active="request()->is('login')">login</x-nav-link>
        <x-nav-link href='/register' :active="request()->is('register')">register</x-nav-link>
        @endguest

        @auth 
        <form action="/logout" method="POST" >
            @csrf
            <x-form-button>Logout</x-form-button>
        </form>
        
        <p>
            current user: {{auth()->user()->email}}
        </p> 
        <x-nav-link href="{{route('profile.show', auth()->user())}}">profile</x-nav-link>
        @if(auth()->user()->is_admin)

            <x-nav-link href="/admin">Admin dashboard</x-nav-link>
        
        @endif
        @endauth
        
    </nav>
    {{$slot}}
    <br>


     
</body>
</html>