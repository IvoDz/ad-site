@extends('layout')

@section('content')

<h1 class="text-4xl font-bold mb-8 text-center">{{__('messages.welcome')}}</h1>

<div class="flex justify-center items-center">
    <div class="w-1/2">
        <h2 class="text-2xl font-bold mb-4 text-center">{{__('messages.browse_by')}}</h2>
        <div class="grid grid-cols-2 gap-8">
            @foreach ($categories as $category)
            <div class="bg-gray-100 border border-gray-200 rounded p-6 hover:shadow-md">
                <a href="{{ route('advertisements.listByCategory', $category->name) }}" class="flex flex-col items-center justify-center">
                    @if ($category->pic)
                        <div class="h-24 w-24 mb-4">
                            <img src="{{ asset('storage/' . $category->pic) }}" alt="{{ $category->name }}" class="object-cover rounded-full">
                        </div>
                    @else
                        <div class="h-24 w-24 mb-4 bg-gradient-to-br from-blue-500 to-green-500 rounded-full"></div>
                    @endif
                    <h3 class="text-xl font-bold text-center">{{ $category->name }}</h3>
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
