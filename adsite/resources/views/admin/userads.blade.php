@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">{{ $msg }}</h1>
    @if ($advertisements->count() > 0)
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($advertisements as $advertisement)
        <div class="bg-gray-50 border border-gray-200 rounded p-6 grid grid-cols-2">
            <div>
                <h3 class="text-2xl">
                    <a href="{{ route('advertisements.show', $advertisement->id) }}">{{ $advertisement->title }}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{ $advertisement->price }}</div>
            </div>

            <div class="flex items-center justify-end">
                @if ($advertisement->pic)
                <div class="w-32 h-32 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $advertisement->file->path) }}" alt="Ad Pic" class="object-contain w-full h-full">
                </div>
                @else
                <img class="w-12 h-12" src="{{ asset('storage/no-photo.png') }}" alt="Default Ad Pic">
                @endif
            </div>

        </div>
        @endforeach
            @else
                <div class="flex justify-center mt-4">
                    <p class="text-2xl font-bold mt-4 text-center">{{__('messages.no_listed')}}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
