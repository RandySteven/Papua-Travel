<x-app-layout>
    <x-slot name="title">
        Select
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('holiday.package.store') }}" method="POST">
                        @csrf
                        <div class="form-group my-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="w-full">
                        </div>
                        <div class="form-group my-2">
                            <label for="expired">Expired Date</label>
                            <input type="date" name="expired" id="expired" class="w-full">
                        </div>
                        <div class="form-group my-2">
                            <label for="schedule_id">Schedule</label>
                            <select name="schedule_id" id="schedule_id" class="w-full">
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">
                                        <div class="w-full border-2 border-black py-2 text-center">
                                            <div class="form-group my-4">
                                                From : {{ $schedule->departure_location }}<br>
                                                To : {{ $schedule->arival_location }} <br>
                                                Schedule time : {{ $schedule->schedule_time }} <br>
                                                Arival time : {{ $schedule->arival_time }} <br>
                                                Date : {{ $schedule->schedule_date }} <br>
                                                Price : Rp {{ number_format($schedule->price, 2) }}
                                            </div>
                                        </div>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_id">Hotel</label>
                            <select name="hotel_id" id="hotel_id" class="w-full">
                                @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}">
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
                                                        <a href="{{ route('rating.show', $hotel->rating) }}"
                                                            class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                                            <img src="{{ asset('/images/star.png') }}" width="10" alt="">
                                                            <span>{{ $hotel->rating->rating_score }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="discount">Discount</label>
                            <input type="number" name="discount" id="discount" class="w-full">
                        </div>
                        <div class="form-group my-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" class="w-full"></textarea>
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
