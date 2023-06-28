@extends('layout')

@section('content')
    <h1 class="text-center text-4xl font-bold">{{__('messages.ad_options')}}</h1>

    @if(session('success_message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success_message') }}</span>
    </div>
    @endif


    @component('components.admin-ads-filter')
    @endcomponent

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($advertisements as $advertisement)
            <div class="bg-gray-50 border border-gray-200 rounded p-6 grid grid-cols-2">
                <div>
                    <h3 class="text-2xl">
                        <a href="{{ route('advertisements.show', $advertisement->id) }}">{{ $advertisement->title }}</a>
                    </h3>
                    <div class="text-xl font-bold mb-4">{{ $advertisement->price }}</div>
                    <div class="text-xl font-bold mb-4">{{ $advertisement->created_at}}</div>
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

                <div class="flex justify-end mt-4">
                    <a href="{{ route('advertisements.edit', ['id' => $advertisement->id]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                        onclick="return confirm('{{__('messages.ad_con_edit')}}')">{{__('messages.edit')}}</a>
                    <a href="{{ route('advertisements.destroy', ['id' => $advertisement->id]) }}" class="ml-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
                        onclick="return confirm('{{__('messages.ad_con_del')}}')">{{__('messages.del')}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
