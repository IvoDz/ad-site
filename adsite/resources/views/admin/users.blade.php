@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">{{__('messages.man_users')}}</h1>

    <div class="mt-8">
        <form action="{{ route('admin.users') }}" method="GET" class="flex justify-center items-center mb-4">
            <input type="text" name="search" placeholder="{{__('messages.search_name_email')}}" class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-500">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md ml-4 hover:bg-green-600">{{__('messages.search')}}</button>
        </form>
    </div>

    @if(session('success_message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success_message') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        @foreach ($users as $user)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex items-center mb-4">
                    @if ($user->profile_pic)
                        <img src="{{ asset('storage/' . $user->profilePicture->path) }}" alt="Profile Picture"  class="w-16 h-16 rounded-full">
                    @else
                        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/default-profile-pic.jpg') }}" alt="Default Profile Picture">
                    @endif
                    <div>
                        <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                        <p class="text-lg text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="flex">
                    @if (!$user->is_admin)
                    <form action="{{route('admin.userban' ,  ['id' => $user->id])}}" method="GET">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">{{__('messages.ban')}}</button>
                    </form>
                    @endif
                    <a href="{{route('admin.userads' ,  ['id' => $user->id])}}" class="bg-green-500 text-white px-4 py-2 rounded ml-4 hover:bg-green-600">{{__('messages.view_lis')}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
