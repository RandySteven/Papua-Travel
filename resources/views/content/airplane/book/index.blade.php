<x-app-layout>
    <x-slot name="title">
        Bookings
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('airplane.transaction.store') }}" method="post">
                <div class="p-6 bg-white border-b border-gray-200">
                        @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="w-full border-2 border-black">
                            <thead class="border-2 border-black ">
                                <th class="border-2 border-black">Airplane</th>
                                <th class="border-2 border-black">Seat</th>
                                <th class="border-2 border-black">Departure Date</th>
                                <th class="border-2 border-black">From</th>
                                <th class="border-2 border-black">To</th>
                                <th class="border-2 border-black">Departure Time</th>
                                <th class="border-2 border-black">Arival Time</th>
                                <th class="border-2 border-black">Name</th>
                                <th class="border-2 border-black">Passenger Age</th>
                            </thead>
                            <tbody class="border-2 border-black text-center">
                                @foreach ($bookings as $booking)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">{{ $booking->seat->schedule->airplane->airplane_name }}</td>
                                    <td class="border-2 border-black">{{ $booking->seat->seat }}</td>
                                    <td class="border-2 border-black">{{ $booking->departure_date }}</td>
                                    <td class="border-2 border-black">{{ $booking->from }}</td>
                                    <td class="border-2 border-black">{{ $booking->to }}</td>
                                    <td class="border-2 border-black">{{ $booking->schedule_time }}</td>
                                    <td class="border-2 border-black">{{ $booking->arival_time }}</td>
                                        <td class="border-2 border-black">
                                            <input type="text" name="passenger_name[]" id="" placeholder="Passenger Name">
                                        </td>
                                        <td class="border-2 border-black">
                                            <input type="number" name="passenger_age[]" id="" placeholder="Passenger Age">
                                        </td>
                                    {{-- <td class="border-2 border-black">
                                        <form action="{{ route('booking.delete', $booking) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-2 py-2">DELETE</button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>

                            <input type="hidden" name="airplane_id" value="{{ $booking->seat->schedule->airplane->id }}">
                            {{-- <input type="hidden" name="passenger_name" value="{{ $passenger_name }}">
                            <input type="hidden" name="passenger_age" value="{{ $passenger_age }}"> --}}
                            <input type="hidden" name="schedule_time" value="{{ $booking->schedule_time }}">
                            <input type="hidden" name="arival_time" value="{{ $booking->arival_time }}">
                            <input type="hidden" name="to" value="{{ $booking->to }}">
                            <input type="hidden" name="from" value="{{ $booking->from }}">
                            <input type="hidden" name="departure_date" value="{{ $booking->departure_date }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded px-2 py-2">Submit</button>

                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
