@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">User Management</h1>

    <div class="mt-8">
        <form action="{{ route('admin.users') }}" method="GET" class="flex justify-center items-center mb-4">
            <input type="text" name="search" placeholder="Search by name or email..." class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-500">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md ml-4 hover:bg-green-600">Search</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        @foreach ($users as $user)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex items-center mb-4">
                    @if ($user->profile_pic)
                        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/images/' . $user->profilePicture->filename) }}" alt="Profile Picture">
                    @else
                        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('images/default-profile-picture.png') }}" alt="Default Profile Picture">
                    @endif
                    <div>
                        <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                        <p class="text-lg text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="flex">
                    <form action="#" method="POST">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete User</button>
                    </form>
                    <a href="#" class="bg-green-500 text-white px-4 py-2 rounded ml-4 hover:bg-green-600">View Listings</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
