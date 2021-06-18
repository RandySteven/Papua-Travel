<x-app-layout>
    <x-slot name="style">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("/images/5e7c11eb5b9a9.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </x-slot>
    <x-slot name="title">
        Airplanes
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <div  class="py-2 w-full bg-green-700 hover:bg-green-600 my-2 text-center text-white">
                                <a href="{{ route('airplane.create') }}">Create Airplane</a>
                            </div>
                        @endif
                    @endauth

                    {{-- <div class="min-h-screen bg-gray-300 dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
                        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4"> --}}
                        @forelse ($airplanes as $airplane)
                        <a href="{{ route('airplane.show', $airplane) }}">
                            <div class="bg-gray-100 my-2 border-indigo-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-indigo-400 dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                <img class="w-16 h-16 object-cover" src="{{ asset('storage/'.$airplane->airplane_image) }}" alt="" />
                                <div class="flex flex-col justify-center">
                                  <p class="text-gray-900 dark:text-gray-300 font-semibold">{{ $airplane->airplane_name }}</p>
                                </div>
                            </div>
                        </a>
                        @empty
                            <x-session></x-session>
                        @endforelse
                        {{-- </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
