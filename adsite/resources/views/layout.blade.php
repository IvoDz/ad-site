<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lightgallery.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#50C878",
                    },
                },
            },
        };
    </script>

    <title>Adsite</title>
</head>
<body >
    <nav class="sticky top-0 flex justify-between items-center mb-6 bg-stone-200">
        <a href="/" class="flex items-center">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-16 h-16">

        <ul class="flex space-x-6 mr-auto text-lg pl-3">
            @guest
                <li>
                    <a href="{{ route('register') }}" class="hover:text-laravel px-4">
                        <i class="fa-solid fa-user-plus"></i> {{__('messages.register')}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="hover:text-laravel px-4">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> {{__('messages.login')}}
                    </a>
                </li>
            @else
            <li>
                <a href="{{route('dashboard')}}" class="hover:text-laravel">
                    <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="hover:text-laravel" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-sign-out"></i> {{__('messages.logout')}}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="{{ route('setLocale', ['locale' => 'en']) }}" class="hover:text-laravel">
                    <img src="{{ asset('images/gb.png') }}" alt="gb_icon">
                </a>
            </li>
            <li>
                <a href="{{ route('setLocale', ['locale' => 'lv']) }}" class="hover:text-laravel">
                    <img src="{{ asset('images/lv.png') }}" alt="lv_icon">
                </a>
            </li>
            <li>
                <a href="{{ route('setLocale', ['locale' => 'de']) }}" class="hover:text-laravel">
                    <img src="{{ asset('images/ge.png') }}" alt="ge_icon">
                </a>
            </li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/js/lightgallery.min.js"></script>
</body>
</html>
