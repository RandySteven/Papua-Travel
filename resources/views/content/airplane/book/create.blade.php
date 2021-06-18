<x-app-layout>
    <x-slot name="title">
        Book Now
    </x-slot>
    @php
    $provinces = array(
'Aceh',
'Sumatera Utara - North Sumatera',
'Riau',
'Kepulauan Riau - Riau Islands',
'Sumatera Barat - West Sumatera',
'Jambi',
'Bengkulu',
'Sumatera Selatan - South Sumatera',
'Kepulauan Bangka Belitung - Bangka Belitung',
'Lampung',
'Kalimantan Utara - North Kalimantan',
'Kalimantan Barat - West Kalimantan',
'Kalimantan Tenggah - Central Kalimantan',
'Kalimantan Selatan - South Kalimantan',
'Kalimantan Timur - East Kalimantan',
'Kalimantan Utara - North Kalimantan',
'Jakarta',
'Banten',
'Jawa Barat - West Java',
'Jawa Tenggah - Central Java',
'DI Yogyakarta - Yogyakarta Special Region',
'Jawa Timur - East Java',
'Bali',
'Nusa Tenggara Barat - West Nusa Tenggara',
'Nusa Tenggara Timur - East Nusa Tenggara',
'Sulawesi Barat - West Sulawesi',
'Sulawesi Selatan - South Sulawesi',
'Sulawesi Tenggara - South East Sulawesi',
'Gorontalo',
'Sulawesi Utara - North Sulawesi',
'Maluku',
'Maluku Utara - North Maluku',
'Papua',
'Papua Barat - West Papua'
);
@endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group my-2">
                            <label for="departure_date" class="w-full">Departure Date</label>
                            <input type="date" name="departure_date" class="w-full" value="{{ $schedule->schedule_date }}">
                        </div>
                        <div class="form-group my-2">
                            <select name="from" id="from" class="w-full">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}" {{ $province == $schedule->departure_location ? 'selected' : '' }}>{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <select name="to" id="to" class="w-full">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}" {{ $province == 'Papua' ? 'selected' : '' }}>{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
