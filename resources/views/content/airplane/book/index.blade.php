<x-app-layout>
    <x-slot name="title">
        Bookings
    </x-slot>

    @foreach ($bookings as $booking)
        <div class="w-full border-2 border-black my-2">
            {{ $booking }}
        </div>
    @endforeach
    <form action="{{ route('airplane.transaction.store') }}" method="post">
    @csrf
    <input type="hidden" name="airplane_id" value="{{ $booking->seat->airplane->id }}">
    <input type="hidden" name="schedule_time" value="{{ $booking->schedule_time }}">
    <input type="hidden" name="arival_time" value="{{ $booking->arival_time }}">
    <input type="hidden" name="to" value="{{ $booking->to }}">
    <input type="hidden" name="from" value="{{ $booking->from }}">
    <input type="hidden" name="departure_date" value="{{ $booking->departure_date }}">
    <button type="submit">Submit</button>
    </form>

</x-app-layout>
