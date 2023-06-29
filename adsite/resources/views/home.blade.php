@extends('layout')

@section('content')

<style>
    .category-item {
        transition: transform 0.3s, filter 0.3s;
        filter: brightness(0.8); /* Darken the div by default */
    }

    .category-item:hover {
        transform: scale(1.05); /* Apply scale transform on hover for an animated effect */
        filter: brightness(1); /* Brighten the div on hover */
    }

    .category-item a {
        position: relative;
        z-index: 1;
        text-decoration: none;
    }

    .category-item h3 {
        background: rgba(255, 255, 255, 0.8);
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        margin-top: 1rem;
        text-align: center;
        opacity: 0.8; /* Adjust the opacity to your preference */
        transition: opacity 0.3s;
    }

    .category-item:hover h3 {
        opacity: 1; /* Make the text fully visible on hover */
    }
</style>


<h1 class="text-4xl font-bold mb-8 text-center">{{__('messages.welcome')}}</h1>

<div class="flex justify-center items-center">
    <div class="w-1/2">
        <h2 class="text-2xl font-bold mb-4 text-center">{{__('messages.browse_by')}}</h2>
        <div class="grid grid-cols-2 gap-8">
            @foreach ($categories as $category)
            <div class="border border-gray-200 rounded p-6 hover:shadow-md category-item" style="background: @if ($category->pic) url('{{ asset('storage/' . $category->file->path) }}') no-repeat center center / cover; @else linear-gradient(to bottom right, #blue-500, #green-500); @endif">
                <a href="{{ route('advertisements.listByCategory', $category->name) }}" class="flex flex-col items-center justify-center">
                    <h3 class="text-xl font-bold opacity-100">{{__('categories.' . $category->name)  }}</h3>
                </a>
            </div>
            @endforeach
        </div>
        <div class="mt-8 text-center">
            <p class="text-xl mb-4">{{__('messages.or_browse_all')}}</p>
            <a href="{{ route('advertisements.index') }}" class="inline-block px-8 py-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded">{{__('messages.browse_all')}}</a>
        </div>
    </div>
    <div class="w-1/2 flex justify-center items-center">
        <div>
            <h2 class="text-2xl font-bold mb-4 text-center">{{__('messages.look_sell')}}</h2>
            <div class="text-center">
                <p class="text-xl mb-4">{{__('messages.post_now')}}</p>
                <a href="{{ route('advertisements.create') }}" class="inline-block px-8 py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded">{{__('messages.create_new')}}</a>
            </div>
        </div>
    </div>
</div>

@endsection
