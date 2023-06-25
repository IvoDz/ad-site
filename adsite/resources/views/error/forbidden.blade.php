@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold">403 Forbidden</h1>
        <p class="text-center text-lg mt-4">You are not authorized to access this page.</p>
        <div class="flex justify-center mt-8">
            <a href="{{ route('mainpage') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Return to the homepage</a>
        </div>
    </div>
@endsection
