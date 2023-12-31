@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">{{__('messages.register')}}</h1>

        <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-lg font-medium">{{__('messages.name')}}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="text-lg font-medium">{{__('messages.email')}}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="text-lg font-medium">{{__('messages.pwd')}}</label>
                <input id="password" type="password" name="password" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="text-lg font-medium">{{__('messages.c_pwd')}}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="profile_picture" class="text-lg font-medium">{{__('messages.profpic')}}</label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">{{__('messages.register')}}</button>
        </form>
    </div>
@endsection
