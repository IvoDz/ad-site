@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">{{__('messages.login')}}</h1>

        <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="email" class="text-lg font-medium">{{__('messages.email')}}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="text-lg font-medium">{{__('messages.pwd')}}</label>
                <input id="password" type="password" name="password" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <input class="mr-1" type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-lg">{{__('messages.rem')}}</label>
            </div>

            <div class="mb-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-lg">{{__('messages.forget')}}</a>
                @endif
            </div>

            <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">{{__('messages.login')}}</button>
        </form>
    </div>
@endsection
