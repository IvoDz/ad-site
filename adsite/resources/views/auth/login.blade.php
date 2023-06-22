@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="email" class="text-lg font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="text-lg font-medium">Password</label>
                <input id="password" type="password" name="password" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <input class="mr-1" type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-lg">Remember Me</label>
            </div>

            <div class="mb-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-lg">Forgot Your Password?</a>
                @endif
            </div>

            <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">Login</button>
        </form>
    </div>
@endsection
