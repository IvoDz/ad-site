@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">Categories</h1>

    @if(session('success_message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success_message') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-4">
        @foreach ($categories as $category)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <h3 class="text-2xl font-bold">{{ $category->name }}</h3>
                <p class="text-lg text-gray-500">Created at: {{ $category->created_at }}</p>
                <p class="text-lg text-gray-500">Listings: {{ $category->amount_of_listings }}</p>
                <div class="flex justify-end mt-4">
                    <form id="delete-category-form-{{ $category->id }}" action="{{ route('admin.destroy', ['id' => $category->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="#" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category and all associated advertisements?')) { document.getElementById('delete-category-form-{{ $category->id }}').submit(); }">Delete</a>
                    <a href="{{ route('admin.edit', ['id' => $category->id]) }}"  class="ml-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Rename</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        <a href="{{ route('admin.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Create New Category</a>
    </div>
@endsection
