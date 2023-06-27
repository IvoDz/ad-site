@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">Rename Category: {{ $category->name }}</h1>

        <form action="{{ route('admin.update', ['id' => $category->id]) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('POST')

            <div class="mb-6">
                <label for="name" class="text-lg font-medium">Category Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
