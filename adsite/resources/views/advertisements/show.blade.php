@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Display advertisement details -->
            <h2 class="text-3xl font-bold mb-4">{{ $advertisement->title }}</h2>
            <p class="text-lg">{{__('messages.price')}}{{ $advertisement->price }}</p>

            <!-- Display picture if available -->
            @if ($advertisement->pic)
            <img src="{{ asset('storage/' . $advertisement->file->path) }}" alt="Profile Picture"  class="h-auto max-w-lg rounded-lg">
        @else
        <img class="w-12 h-12" src="{{ asset('storage/no-photo.png') }}" alt="Default Profile Picture">
        @endif
            <p class="text-lg mt-4">{{__('messages.desc')}} : {{ $advertisement->description }}</p>
            <p class="text-lg mt-4">{{__('messages.seller')}} {{ $advertisement->seller->name }}</p>
            <p class="text-lg mt-4">{{__('messages.email')}} <a href="mailto:{{ $advertisement->seller->email}}">{{ $advertisement->seller->email}}</a></p>
        </div>
    </div>

    <!-- Initialize lightgallery -->
    <script>
        lightGallery(document.querySelector('.lightbox'));
    </script>
@endsection
