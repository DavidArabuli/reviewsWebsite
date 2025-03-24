<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>{{$heading}}</title>
</head>
<body>
    <nav>
        
        <x-nav-link href='/' :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href='/reviews' :active="request()->is('reviews')">reviews</x-nav-link>
        <x-nav-link href='/contact' :active="request()->is('contact')">contact</x-nav-link>
        <x-nav-link href='/games' :active="request()->is('games')">all games</x-nav-link>

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
        
        @if(auth()->user()->is_admin)

            <x-nav-link href="/admin">Admin dashboard</x-nav-link>
            <p>
                current user: {{auth()->user()->email}}
            </p> 
        
        @endif
        @endauth
        
    </nav>
    {{$slot}}
    <br>
    {{-- @auth
    <p>User is authenticated: {{ auth()->user()->email }}</p>
@else
    <p>User is NOT authenticated</p>
@endauth --}}

    @can('create', \App\Models\Review::class)
    <x-button href="/reviews/create">write a review</x-button>
    @endcan  
</body>
</html>