<x-app-layout>
    <x-slot name="title">
        Airplane Transaction
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1">
                        @foreach ($transactions as $transaction)
                            <div class="border-2 border-black my-2 px-2">
                                <table class="border-2 border-black my-2 w-full">
                                    <tbody class="border-2 border-black my-2">
                                        <tr class="border-2 border-black my-2">
                                            <td class="border-2 border-black my-2">Airplane</td>
                                            <td class="border-2 border-black my-2">{{ $transaction->airplane->airplane_name }}</td>
                                        </tr>
                                        <tr class="border-2 border-black my-2">
                                            <td class="border-2 border-black my-2">Schedule Date</td>
                                            <td class="border-2 border-black my-2">{{ $transaction->departure_date }}</td>
                                        </tr>
                                        <tr class="border-2 border-black my-2">
                                            <td class="border-2 border-black my-2">From</td>
                                            <td class="border-2 border-black my-2">{{ $transaction->from }}</td>
                                        </tr>
                                        <tr class="border-2 border-black my-2">
                                            <td class="border-2 border-black my-2">To</td>
                                            <td class="border-2 border-black my-2">{{ $transaction->to }}</td>
                                        </tr>
                                        <tr class="border-2 border-black my-2">
                                            <td class="border-2 border-black my-2">Time</td>
                                            <td class="border-2 border-black my-2">{{ $transaction->schedule_time }} - {{ $transaction->arival_time }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="my-5">
                                    <a class="rounded text-white px-2 py-2 my-2 bg-red-500 hover:bg-red-600" href="{{ route('airplane.transaction.show', $transaction) }}">See Detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
