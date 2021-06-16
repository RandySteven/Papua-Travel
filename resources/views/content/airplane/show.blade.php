<x-app-layout>
    <x-slot name="title">
        {{ $airplane->airplane_name }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('storage/'.$airplane->airplane_image) }}" alt="">
                    <p class="text-2xl">{{ $airplane->airplane_name }}</p>

                    @auth
                        @if (Auth::user()->hasRole('admin'))
                        <div class="my-2">
                            @include('content.airplane.seat.create', ['airplane_id' => $airplane->id])
                        </div>

                        <div class="my-2 py-2 px-2 border-2 border-black">
                            @include('content.airplane.schedule.create', ['airplane_id' => $airplane->id])
                        </div>
                        @endif
                    @endauth
                    <div class="grid grid-cols-6 mx-4">
                        @foreach ($airplane->seats as $seat)
                            <a href="" class="px-1 py-3 mx-2 my-2
                               {{ $seat->status == 'Aviable' ? 'bg-green-500' : 'bg-red-500' }}
                            text-center">{{ $seat->seat }}</a>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-1 my-2">
                        @foreach ($airplane->schedules as $schedule)
                            <div class="w-full border-2 border-black py-2 text-center">
                                {{ $schedule }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>