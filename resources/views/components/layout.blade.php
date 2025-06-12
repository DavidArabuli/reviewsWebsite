<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="stylesheet" href="{{ asset('app.css') }}"> --}}
    
    {{-- editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    {{-- editor end --}}
    {{-- swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySwiper', {
            slidesPerView: 3,
            spaceBetween: 16,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
    });
</script>

{{-- swiper end --}}
    <title>{{$heading}}</title>
</head>
<body class="body">
    <nav class="nav">
        <p class="text-red-600">
            Tailwind is working
        </p>
        <div class="navlink-block border border-red-500">

            
            <x-nav-link class="text-red-600" href='/' :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href='/reviews' :active="request()->is('reviews')">reviews</x-nav-link>
            <x-nav-link href='/contact' :active="request()->is('contact')">contact</x-nav-link>
            <x-nav-link href='/games' :active="request()->is('games')">all games</x-nav-link>
            <x-nav-link href='/tags' :active="request()->is('tags')">all tags</x-nav-link>
            
            @guest 
            <x-nav-link href='/login' :active="request()->is('login')">login</x-nav-link>
            <x-nav-link href='/register' :active="request()->is('register')">register</x-nav-link>
            @endguest
            
            @auth 
            
            
            <x-nav-link href="{{route('profile.show', auth()->user())}}">profile</x-nav-link>
            @if(auth()->user()->is_admin)
            
            <x-nav-link href="/admin">Admin dashboard</x-nav-link>
            
            @endif
        </div>
        <div>

            <form action="/logout" method="POST" >
                @csrf
                <x-form-button>Logout</x-form-button>
            </form>
            @endauth
        </div>
        
    </nav>
    {{$slot}}
    <br>

     
</body>
</html>