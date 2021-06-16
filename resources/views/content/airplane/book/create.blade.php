<x-app-layout>
    <x-slot name="title">
        Book Now
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group my-2">
                            <label for="departure_date" class="w-full">Departure Date</label>
                            <input type="date" name="departure_date" class="w-full">
                        </div>
                        <div class="form-group my-2">
                            <label for="return_date" class="w-full">Return Date</label>
                            <input type="date" name="return_date" class="w-full">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
