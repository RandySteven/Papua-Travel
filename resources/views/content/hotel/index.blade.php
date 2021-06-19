<x-app-layout>
    <x-slot name="title">
        Hotel
    </x-slot>

    <x-slot name="style">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("/images/modern-luxury-hotel-office-reception-lounge-with-meeting-room.jpg");
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
                            <a href="{{ route('hotel.create') }}">Create Hotel</a>
                        </div>
                        @endif
                    @endauth

                    @forelse ($hotels as $hotel)
                    <div class="bg-white shadow-md  rounded-3xl p-4 my-2 border-2 border-black">
                        <div class="flex-none lg:flex">
                            <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                <img src="{{ asset('storage/'.$hotel->hotel_image) }}"
                                    alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2">
                                <div class="flex flex-wrap ">
                                    <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                        Hotel
                                    </div>
                                    <h2 class="flex-auto text-lg font-medium">{{ $hotel->hotel_name }}</h2>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4  text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="">{{ $hotel->hotel_address }}</p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">
                                        Aviable Room : {{ $hotel->rooms->where('status', '=', 'Aviable')->count() }}
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <div class="flex-auto flex space-x-3">
                                        <button
                                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                            <img src="{{ asset('/images/star.png') }}" width="10" alt="">
                                            <span>{{ $hotel->rating->rating_score }}</span>
                                        </button>
                                    </div>
                                    <a
                                        class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                        href="{{ route('hotel.show',$hotel) }}" aria-label="like">See Hotel</a>
                                    @auth
                                        @if (Auth::user()->hasRole('admin'))
                                            <a
                                                class="mb-2 md:mb-0 bg-green-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                href="{{ route('hotel.edit',$hotel) }}" aria-label="like">Edit</a>
                                            <form action="{{ route('hotel.delete', $hotel) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="
                                                mb-2 md:mb-0 bg-red-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-red-800
                                                ">Delete</button>
                                            </form>
                                        @endif
                                    @endauth
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
