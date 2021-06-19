<x-app-layout>
    <x-slot name="title">
        {{ $hotel->hotel_name }}
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

                    <img src="{{ asset('storage/'.$hotel->hotel_image) }}" alt="">

                    <h2 class="text-2xl">
                        {{ $hotel->hotel_name }}
                    </h2>

                    <p>{!! nl2br($hotel->hotel_description) !!}</p>

                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            @include('content.hotel.room.create', ['hotel_id'=>$hotel->id])
                        @endif
                    @endauth

                    @include('content.hotel.room.index', ['rooms' => $hotel->rooms])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
