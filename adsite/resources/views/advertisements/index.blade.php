@extends('layout')

@section('content')

<h1 class="text-center text-4xl font-bold"> {{$msg}} </h1>

@component('components.ads-filter')
@endcomponent

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach ($advertisements as $advertisement)
    <div class="bg-gray-50 border border-gray-200 rounded p-6 grid grid-cols-2">
        <div>
            <h3 class="text-2xl">
                <a href="{{ route('advertisements.show', $advertisement->id) }}">{{ $advertisement->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $advertisement->price }}</div>
        </div>

        @if ($advertisement->pic)
            <img class="w-48 ml-auto md:block" src="{{ asset('storage/images/' . $advertisement->pic . '.' . $advertisement->file->type) }}" alt="Advertisement Picture">
        @else
            <img class="w-48 ml-auto md:block" src="{{ asset('images/logo.png') }}" alt="Placeholder Image">
        @endif

    </div>
    @endforeach
</div>

@endsection
