@extends('layout')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Display advertisement details -->
            <h2 class="text-3xl font-bold mb-4">{{ $advertisement->title }}</h2>
            <p class="text-lg">Price: ${{ $advertisement->price }}</p>

            <!-- Display picture if available -->
            @if($advertisement->pic)
                <div class="my-6 grid grid-cols-2 gap-4">
                    <div>
                        <a href="{{ asset('storage/images/' . $advertisement->pic . '.' . $advertisement->file->type) }}" class="lightbox">
                            <img src="{{ asset('storage/images/' . $advertisement->pic . '.' . $advertisement->file->type) }}" alt="Advertisement Picture" class="w-full h-auto max-h-64 object-cover rounded-lg">
                        </a>
                    </div>
                    <!-- Add more image containers as needed -->
                </div>
            @endif

            <!-- Display other advertisement details -->
            <p class="text-lg mt-4">Description: {{ $advertisement->description }}</p>

            <!-- Display additional details as needed -->
            <p class="text-lg mt-4">Seller: {{ $advertisement->seller->name }}</p>
        </div>
    </div>

    <!-- Initialize lightgallery -->
    <script>
        lightGallery(document.querySelector('.lightbox'));
    </script>
@endsection
