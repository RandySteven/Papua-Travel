<x-app-layout>
@php
    $total = 0;
@endphp
    <x-slot name="title">
        Bookings
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-2 border-black">
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
                                @forelse ($bookings as $booking)
                                <tr class="border-2 border-black">
                                    @php
                                        $package = App\Models\Package::where('schedule_id', $booking->seat->schedule->id)->first();
                                    @endphp
                                    <td class="border-2 border-black">{{ $booking->seat->schedule->airplane->airplane_name }}</td>
                                    <td class="border-2 border-black">{{ $booking->seat->seat }}</td>
                                    <td class="border-2 border-black">{{ $booking->departure_date }}</td>
                                    <td class="border-2 border-black">{{ $booking->from }}</td>
                                    <td class="border-2 border-black">{{ $booking->to }}</td>
                                    <td class="border-2 border-black">{{ $booking->schedule_time }}</td>
                                    <td class="border-2 border-black">{{ $booking->arival_time }}</td>
                                        <td class="border-2 border-black">
                                            <input type="text" class="border-blue-500" name="passenger_name[]" id="" placeholder="Passenger Name">
                                        </td>
                                        <td class="border-2 border-black">
                                            <input type="number" name="passenger_age[]" id="" placeholder="Passenger Age">
                                        </td>
                                    <td class="border-2 border-black">
                                        <button class="modal-open bg-transparent border border-gray-500 hover:border-red-500 text-gray-500 hover:text-red-500 font-bold py-2 px-4 rounded-full">Delete</button>
                                    </td>
                                </tr>
                                @php
                                    $total += ($booking->seat->schedule->price * $package->discount) / 100
                                @endphp
                                @empty
                                    <x-session></x-session>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div>
                        @empty($booking)

                        @else

                        <input type="hidden" name="airplane_id" value="{{ $booking->seat->schedule->airplane->id }}">
                        {{-- <input type="hidden" name="passenger_name" value="{{ $passenger_name }}">
                        <input type="hidden" name="passenger_age" value="{{ $passenger_age }}"> --}}
                        <input type="hidden" name="schedule_time" value="{{ $booking->schedule_time }}">
                        <input type="hidden" name="arival_time" value="{{ $booking->arival_time }}">
                        <input type="hidden" name="to" value="{{ $booking->to }}">
                        <input type="hidden" name="from" value="{{ $booking->from }}">
                        <input type="hidden" name="departure_date" value="{{ $booking->departure_date }}">
                        <p> <b> Rp. {{ number_format($total, 2) }} </b> </p>
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded px-2 py-2">Check Out</button>
                        @endempty

                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>


    {{-- Modal --}}
    @empty($booking)

    @else

    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

          <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
          </div>

          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Delete Form</p>
              <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>

            <!--Body-->
            Are you sure want to delete ?

            <!--Footer-->
            <div class="flex justify-end pt-2">
            <form action="{{ route('booking.delete', $booking) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-4 bg-transparent p-3 rounded-lg text-red-500 hover:bg-gray-100 hover:text-red-400 mr-2">Delete</button>
            </form>
              <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
            </div>

          </div>
        </div>
    </div>
    @endempty


    <script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };


    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    </script>
</x-app-layout>
