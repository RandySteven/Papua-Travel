<x-app-layout>
    <x-slot name="title">
        Cart
    </x-slot>
    @php
        $total = 0
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Mr. {{ strtoupper($cart->user->name) }}
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
                                <th class="border-2 border-black">Action</th>
                            </thead>
                            <tbody class="border-2 border-black text-center">
                                @foreach ($carts as $cart)
                                <tr class="border-2 border-black">
                                    <td class="border-2 border-black">{{ $cart->room->hotel->hotel_name }}</td>
                                    <td class="border-2 border-black"><img src="{{ asset('storage/'.$cart->room->room_image) }}"
                                        width="250" height="250" alt=""></td>
                                    <td class="border-2 border-black">{{ $cart->room->room_number }}</td>
                                    <td class="border-2 border-black">{{ $cart->from_date }}</td>
                                    <td class="border-2 border-black">{{ $cart->to_date }}</td>
                                    <td class="border-2 border-black">{{ $cart->nights }}</td>
                                    <td class="border-2 border-black">{{ $cart->room->room_price_pernight }}</td>
                                    <td class="border-2 border-black">{{ $cart->room->room_price_pernight * $cart->nights }}</td>
                                    <td class="border-2 border-black">
                                        <form action="{{ route('cart.delete', $cart) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white py-2">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $total += ($cart->room->room_price_pernight * $cart->nights)
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-right">
                            <b>
                                {{ $total }}
                            </b>
                        </p>
                        @empty($cart)
                            <x-session></x-session>
                        @else
                            <form action="{{ route('hotel.transaction.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $cart->room->hotel->id }}">
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white py-2 rounded">
                                    Check Out
                                </button>
                            </form>
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
