<x-app-layout>
    <x-slot name="title">
        Traditions
    </x-slot>

    <x-slot name="style">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("/images/tradition-papua.jpg");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <div  class="py-2 w-full bg-green-700 hover:bg-green-600 my-2 text-center text-white">
                                <a href="{{ route('tradition.create') }}">Create Tradition</a>
                            </div>
                        @endif
                    @endauth

                    @forelse ($traditions as $tradition)
                            <div class="flex flex-col">
                                <div class="bg-white shadow-md  rounded-3xl p-4">
                                    <div class="flex-none lg:flex">
                                        <div class=" h-full w-full lg:h-48 lg:w-50   lg:mb-0 mb-3">
                                            <img src="{{ asset('storage/'.$tradition->tradition_image) }}"
                                                alt="Just a flower" class="w-full object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                        </div>
                                        <div class="flex-auto ml-3 justify-evenly py-2">
                                            <div class="flex flex-wrap ">
                                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                                    Travel tradition
                                                </div>
                                                <h2 class="flex-auto text-lg font-medium">{{ $tradition->tradition_name }}</h2>
                                            </div>
                                            <p class="mt-3"></p>
                                            <div class="flex py-4  text-sm text-gray-600">
                                                <div class="flex-1 inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p>{{ Str::limit($tradition->tradition_description, 900, '...') }}</p>
                                                </div>
                                            </div>
                                            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                            <div class="flex space-x-3 text-sm font-medium">
                                                <a
                                                    class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                    href="{{ route('tradition.show', $tradition) }}" aria-label="like">See Detail Tradition</a>
                                                {{-- <a
                                                    class="mb-2 md:mb-0 bg-green-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-green-800"
                                                    href="{{ route('tradition.edit', $tradition) }}" aria-label="like">Edit Tradition</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @empty
                        <x-session></x-session>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
