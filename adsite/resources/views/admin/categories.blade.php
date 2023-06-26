@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">Categories</h1>

    <div class="grid grid-cols-2 gap-4 mx-4">
        @foreach ($categories as $category)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <h3 class="text-2xl font-bold">{{ $category->name }}</h3>
                <p class="text-lg text-gray-500">Created at: {{ $category->created_at }}</p>
                <p class="text-lg text-gray-500">Listings: {{ $category->amount_of_listings }}</p>
            </div>
        @endforeach
    </div>
@endsection
