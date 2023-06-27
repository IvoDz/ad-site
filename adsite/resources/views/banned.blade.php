@extends('layout')

@section('content')
    <div class="flex justify-center items-center mt-20">
        <div class="max-w-md p-6 bg-white rounded shadow">
            <h1 class="text-4xl font-bold mb-8 text-center">YOU ARE BANNED!</h1>
            <p class="text-lg mb-6">Your account has been banned. Please contact the support team for more information.</p>
            <div class="flex justify-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
