@extends('layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{__('messages.dash')}}</h1>

        <h2 class="text-xl font-bold mb-2">{{__('messages.user_info')}}</h2>
        <div class="flex items-center mb-4">
            @if ($user->profile_pic)
            <img src="{{ asset('storage/' . $user->profilePicture->path) }}" alt="Profile Picture"  class="w-16 h-16 rounded-full">
        @else
        <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('storage/default-profile-pic.jpg') }}" alt="Default Profile Picture">
        @endif
            <div>
                <p class="font-bold">{{ $user->name }}</p>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>
        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-green-500 text-white rounded-md mb-4">{{ __('messages.edit_profile') }}</a>

        @if(session('success_message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success_message') }}</span>
            </div>
        @endif
        <div>
            <h2 class="text-xl font-bold mb-2">{{__('messages.ads_user')}}</h2>
            @if ($advertisements->count() > 0)
                @foreach ($advertisements as $advertisement)
                    <div class="border rounded-md p-4 mb-4">
                        <h3 class="text-lg font-bold">{{ $advertisement->title }}</h3>
                        <p class="text-gray-600">{{__('messages.price')}}{{ $advertisement->price }}</p>
                        <p>{{ $advertisement->description }}</p>
                        <div class="flex mt-4">
                            <a href="{{ route('advertisements.edit', ['id' => $advertisement->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded-md mr-2">{{__('messages.edit')}}</a>
                            <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md delete-button" data-advertisement-id="{{ $advertisement->id }}">{{__('messages.del')}}</button>
                        </div>
                    </div>

                    <div id="deleteAdvertisementModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                        <div class="bg-white w-1/3 p-6 rounded-lg">
                            <h2 class="text-lg font-bold mb-4">{{__('messages.conf_del')}}</h2>
                            <p>{{__('messages.you_sure')}}</p>
                            <div class="flex justify-end mt-6">
                                <button id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">{{__('messages.cancel')}}</button>
                                <form id="deleteAdvertisementForm" action="{{ route('advertisements.destroy', ['id' => $advertisement->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">{{__('messages.del')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>{{__('messages.no_listed')}}</p>
            @endif
        </div>
    <script>
        // Get all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const advertisementId = button.getAttribute('data-advertisement-id');
                const deleteAdvertisementForm = document.getElementById('deleteAdvertisementForm');
                const deleteAdvertisementModal = document.getElementById('deleteAdvertisementModal');

                // Update the form action with the advertisement ID
                deleteAdvertisementForm.action = deleteAdvertisementForm.action.replace(':id', advertisementId);

                // Show the delete modal
                deleteAdvertisementModal.classList.remove('hidden');
            });
        });

        // Cancel delete action
        const cancelDeleteButton = document.getElementById('cancelDelete');
        cancelDeleteButton.addEventListener('click', () => {
            const deleteAdvertisementModal = document.getElementById('deleteAdvertisementModal');
            deleteAdvertisementModal.classList.add('hidden');
        });
    </script>
@endsection
