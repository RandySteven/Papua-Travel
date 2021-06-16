<x-app-layout>
    <x-slot name="title">
        {{ $room->room_number }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid xl:grid-cols-2 sm:grid-cols-1">
                        <img src="{{ asset('storage/'.$room->room_image) }}" alt="">
                        <div class="my-5">
                            @auth
                                <h3 class="text-3xl">Book Now</h3>
                                <form action="{{ route('add.to.cart') }}" method="POST">
                                    @csrf
                                    <div class="form-group my-2 grid-cols-2">
                                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                                        <div>
                                            <label class="mr-24" for="from_date">From</label>
                                            <label class="ml-16" for="to_date">To</label>
                                        </div>
                                        <div>
                                            <input type="date" name="from_date" id="from_date">
                                            <input type="date" name="to_date" id="to_date">
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full py-2 rounded bg-red-600 hover:bg-red-500 text-white">
                                        Add to Cart
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
