@extends('layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

        <h2 class="text-xl font-bold mb-2">User Information</h2>
        <div class="flex items-center mb-4">
            @if ($user->profile_pic)
                <p>{{ asset($user->profilePicture->path) }}</p>
            <img src="{{ asset($user->profilePicture->path) }}" @else <div
                    class="w-16 h-16 rounded-full bg-gray-300 mr-4">
        </div>
        @endif
        <div>
            <p class="font-bold">{{ $user->name }}</p>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
    </div>


    @if(session('success_message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success_message') }}</span>
    </div>
    @endif

    <h2 class="text-xl font-bold mb-2">Ads Listed by User</h2>
    <div>
        @if ($advertisements->count() > 0)
            @foreach ($advertisements as $advertisement)
                <div class="border rounded-md p-4 mb-4">
                    <h3 class="text-lg font-bold">{{ $advertisement->title }}</h3>
                    <p class="text-gray-600">Price: ${{ $advertisement->price }}</p>
                    <p>{{ $advertisement->description }}</p>
                    @if ($advertisement->pic)
                        <img src="{{ asset('storage/' . $advertisement->file->path) }}" alt="Ad Image" class="w-full mt-4">
                    @endif
                    <div class="flex mt-4">
                        <a href="{{ route('advertisements.edit', ['id' => $advertisement->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded-md mr-2">Edit</a>
                        <form action="{{ route('advertisements.destroy', ['id' => $advertisement->id]) }}" method="DELETE">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>No advertisements listed.</p>
        @endif
    </div>
    </div>

    <div id="deleteAdvertisementModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-1/3 p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
            <p>Are you sure you want to delete this advertisement?</p>
            <div class="flex justify-end mt-6">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Cancel</button>
                <form id="deleteAdvertisementForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
