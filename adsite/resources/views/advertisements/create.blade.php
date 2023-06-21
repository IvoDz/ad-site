@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">Creating New Advertisement</h1>

        <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="title" class="text-lg font-medium">Title</label>
                <input type="text" name="title" id="title" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="price" class="text-lg font-medium">Price</label>
                <input type="number" name="price" id="price" step="0.01" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="category" class="text-lg font-medium">Category</label>
                <select name="category_id" id="category" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="text-lg font-medium">Description</label>
                <textarea name="description" id="description" rows="4" required class="w-full border border-gray-300 px-4 py-2 rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <label for="picture" class="text-lg font-medium">Picture</label>
                <input type="file" name="picture" id="picture" accept="image/*" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">Create Advertisement</button>
        </form>
    </div>
@endsection
