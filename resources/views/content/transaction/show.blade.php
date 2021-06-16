<x-app-layout>
    <x-slot name="title">
        Hotel Transaction
    </x-slot>
    @php
        $total = 0
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="w-full border-2 border-black">
                            <thead class="border-2 border-black ">
                                <th class="border-2 border-black">Hotel</th>
                                <th class="border-2 border-black">Room Image</th>
                                <th class="border-2 border-black">Room Name</th>
                                <th class="border-2 border-black">From</th>
                                <th class="border-2 border-black">To</th>
                                <th class="border-2 border-black">Night</th>
                                <th class="border-2 border-black">Room Price</th>
                                <th class="border-2 border-black">Price</th>
                            </thead>
                            <tbody class="border-2 border-black text-center">
                                @foreach ($hotel_transaction->hotel_transaction_details as $hotel_transaction_detail)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->room->hotel->hotel_name }}</td>
                                    <td class="border-2 border-black"><img src="{{ asset('storage/'.$hotel_transaction_detail->room->room_image) }}"
                                        width="250" height="250" alt=""></td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->room->room_number }}</td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->from_date }}</td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->to_date }}</td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->nights }}</td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->room->room_price_pernight }}</td>
                                    <td class="border-2 border-black">{{ $hotel_transaction_detail->room->room_price_pernight * $hotel_transaction_detail->nights }}</td>
                                </tr>
                                @php
                                    $total += ($hotel_transaction_detail->room->room_price_pernight * $hotel_transaction_detail->nights)
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-right">
                            <b>
                                {{ $total }}
                            </b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
