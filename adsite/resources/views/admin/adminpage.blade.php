@extends('layout')

@section('content')
    <div class="flex flex-col justify-start items-center h-screen">
        <div class="max-w-md p-6 bg-white rounded shadow mt-20">
            <h1 class="text-4xl font-bold mb-8 text-center">Welcome to Admin Panel</h1>
            <div class="flex flex-col gap-4">
                <a href="{{ route('admin.ads') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Manage Ads
                </a>
                <a href="{{ route('admin.categories') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Manage Categories
                </a>
                <a href="{{ route('admin.users') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Manage Users
                </a>
            </div>
        </div>
    </div>
@endsection
