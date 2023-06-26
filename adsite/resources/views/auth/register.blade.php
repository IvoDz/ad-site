@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">Register</h1>

        <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-lg font-medium">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="text-lg font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="text-lg font-medium">Password</label>
                <input id="password" type="password" name="password" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="text-lg font-medium">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="profile_picture" class="text-lg font-medium">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">Register</button>
        </form>
    </div>
@endsection
