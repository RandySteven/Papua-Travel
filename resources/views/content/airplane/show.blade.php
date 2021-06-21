<x-app-layout>
    <x-slot name="title">
        {{ $airplane->airplane_name }}
    </x-slot>
    <x-slot name="style">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("/images/300px-ANA_777-300_Taking_off_from_JFK.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('storage/'.$airplane->airplane_image) }}" alt="">
                    <p class="text-2xl">{{ $airplane->airplane_name }}</p>

                    @auth
                        @if (Auth::user()->hasRole('admin'))

                        <div class="my-2 py-2 px-2 border-2 border-black">
                            @include('content.airplane.schedule.create', ['airplane_id' => $airplane->id])
                        </div>
                        @endif
                    @endauth

                    <div class="my-12">

                        <div class="grid grid-cols-1 mb-2 ">
                            @foreach ($airplane->schedules as $schedule)
                            @php
                                App\Http\Controllers\ScheduleController::autodelete($schedule);
                            @endphp
                            <div class="border-red-500 border-2 px-2 py-2 my-2">

                                <div class="w-full border-2 border-black py-2 text-center">
                                    <div class="form-group my-4">
                                        from : {{ $schedule->departure_location }}<br>
                                        to : {{ $schedule->arival_location }} <br>
                                        Schedule time : {{ $schedule->schedule_time }} <br>
                                        Arival time : {{ $schedule->arival_time }} <br>
                                        Date : {{ $schedule->schedule_date }}
                                    </div>
                                    <div class="form-group my-2">
                                        <a href="{{ route('booking.create', $schedule) }}" class="w-full px-5 rounded py-3 bg-red-600 hover:bg-red-500 text-white">Book Now</a>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 mx-4 my-8">
                                    @foreach ($schedule->seats as $seat)
                                        <a href="" class="px-1 py-3 mx-2 my-2
                                           {{ $seat->status == 'Aviable' ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500' }}
                                        text-center">{{ $seat->seat }}</a>
                                    @endforeach
                                </div>

                                @auth
                                    @if (App\Models\Schedule::where('airplane_id', '=', $airplane->id)->count()>0 && Auth::user()->hasRole('admin'))
                                        {{-- <div class="my-2 border-2 border-black px-2 py-2">
                                            @include('content.airplane.seat.create', ['schedule_id' => $schedule->id])
                                        </div> --}}
                                        <form action="{{ route('generate.seat') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                            <input type="number" name="row" id="row" placeholder="Row">
                                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white py-1 px-2 rounded">Generate</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
