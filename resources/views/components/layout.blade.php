<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="stylesheet" href="{{ asset('app.css') }}"> --}}
    {{-- cropper --}}
    <link  href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
    {{-- end of cropper --}}
    {{-- editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    {{-- end of editor --}}
    {{-- swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 20,
          }
        }
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('dropdown-menu');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });
</script>

    <title>{{$heading}}</title>
</head>
<body class="body">
    <nav class="nav ">
        <button
            id="menu-toggle"
            class="md:hidden w-full px-4 py-2 bg-indigo-100 border border-indigo-700 outline outline-offset-1 p-2 mt-2 ml-1  hover:bg-indigo-500 hover:text-white cursor-pointer rounded mx-auto">
            toggle menu
        </button>
        
        
        <div id="dropdown-menu" class="grid grid-cols-2 gap-2 md:flex md:flex-row md:justify-center md:items-center md:space-x-4 md: bg-blue-100 md:space-y-0 mt-0">

            
            <x-nav-link class="text-red-600" href='/' :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href='/reviews' :active="request()->is('reviews')">Reviews</x-nav-link>
            <x-nav-link href='/contacts' :active="request()->is('contacts')">Contacts</x-nav-link>
            <x-nav-link href='/games' :active="request()->is('games')">All games</x-nav-link>
            <x-nav-link href='/tags' :active="request()->is('tags')">All tags</x-nav-link>
            
            @guest 
            <x-nav-link href='/login' :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href='/register' :active="request()->is('register')">Register</x-nav-link>
            @endguest
            
            @auth 
            
            
            <x-nav-link href="{{route('profile.show', auth()->user())}}">Profile</x-nav-link>
            @if(auth()->user()->is_admin)
            
            <x-nav-link href="/admin">Admin dashboard</x-nav-link>
            
            @endif
            <form id="logoutForm" action="/logout" method="POST" >
                @csrf
                <x-form-button>Logout</x-form-button>
            </form>
            @endauth
        </div>
        
        
    </nav>
    <div class="m-2">
      {{$slot}}

    </div>
    <br>


</body>
</html>