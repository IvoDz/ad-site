@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-4xl font-bold mb-6">{{__('messages.ren_cat')}} {{ $category->name }}</h1>

        <form action="{{ route('admin.update', ['id' => $category->id]) }}" method="POST" class="max-w-md mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="text-lg font-medium">{{__('messages.catname')}}</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            <div class="mb-4">
                <label for="picture" class="text-lg font-medium">{{__('messages.pic')}}</label>
                <input type="file" name="picture" id="picture" accept="image/*" class="w-full border border-gray-300 px-4 py-2 rounded-md">
            </div>

            @error('picture')
            <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-center">
                <button type="submit" class="bg-laravel text-white py-2 px-4 rounded-md">{{__('messages.save_changes')}}</button>
            </div>
        </form>
    </div>
@endsection
