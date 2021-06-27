<x-app-layout>
    <x-slot name="style">
        <style>
            body{
                background-color: maroon;
            }
        </style>
    </x-slot>

    <x-slot name="title">
        Airplane Transaction
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="my-5">
                        <a href="{{ route('airplane.transaction.index') }}" class="bg-red-500 rounded hover:bg-red-600 text-white px-2 py-2">Back</a>
                    </div>
                    <table class="w-full border-2 border-black">
                        <thead class="border-2 border-black ">
                            <th class="border-2 border-black">Airplane</th>
                            <th class="border-2 border-black">Seat</th>
                            <th class="border-2 border-black">Departure Date</th>
                            <th class="border-2 border-black">From</th>
                            <th class="border-2 border-black">To</th>
                            <th class="border-2 border-black">Departure Time</th>
                            <th class="border-2 border-black">Arival Time</th>
                            <th class="border-2 border-black">Passenger Name</th>
                            <th class="border-2 border-black">Passenger Age</th>
                            <th class="border-2 border-black">Category</th>
                        </thead>
                        <tbody class="border-2 border-black text-center">
                            @foreach ($airplaneTransaction->airplane_transaction_details as $detail)
                            <tr class="border-2 border-black">
                                <td class="border-2 border-black">{{ $detail->seat->schedule->airplane->airplane_name }}</td>
                                <td class="border-2 border-black">{{ $detail->seat->seat }}</td>
                                <td class="border-2 border-black">{{ $airplaneTransaction->departure_date }}</td>
                                <td class="border-2 border-black">{{ $airplaneTransaction->from }}</td>
                                <td class="border-2 border-black">{{ $airplaneTransaction->to }}</td>
                                <td class="border-2 border-black">{{ $airplaneTransaction->schedule_time }}</td>
                                <td class="border-2 border-black">{{ $airplaneTransaction->arival_time }}</td>
                                <td class="border-2 border-black">{{ $detail->passenger_name }}</td>
                                <td class="border-2 border-black">{{ $detail->passenger_age }}</td>
                                <td class="border-2 border-black">
                                    <?php
                                        if($detail->passenger_age < 5){
                                            echo 'Baby';
                                        }else if($detail->passenger_age >= 5 && $detail->passenger_age < 13){
                                            echo 'Kid';
                                        }else if($detail->passenger_age >= 13 && $detail->passenger_age < 18){
                                            echo 'Teen';
                                        }else if($detail->passenger_age >= 18 && $detail->passenger_age < 60){
                                            echo 'Adult';
                                        }else{
                                            echo 'Old';
                                        }
                                    ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
