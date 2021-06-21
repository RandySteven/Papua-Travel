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
<form action="{{ route('schedule.controller') }}" method="post">
    @csrf
    <div class="form-group my-2">
        <label for="departure_location" class="w-full">Departure Location</label>
        <select name="departure_location" class="w-full">
            @foreach ($provinces as $province)
                <option value="{{ $province }}">{{ $province }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group my-2">
        <label for="arival_location" class="w-full">Departure Location</label>
        <select name="arival_location" class="w-full">
            @foreach ($provinces as $province)
                <option value="{{ $province }}">{{ $province }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group my-2">
        <label for="schedule_date">Schedule Date</label>
        <input type="date" name="schedule_date" id="schedule_date" class="w-full @error('schedule_date') border-red-500 @enderror">
        @error('schedule_date')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="schedule_time">Schedule Time</label>
        <input type="time" name="schedule_time" id="schedule_time" class="w-full @error('schedule_time') border-red-500 @enderror">
        @error('schedule_time')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="arival_time">Arival Time</label>
        <input type="time" name="arival_time" id="arival_time" class="w-full @error('arival_time') border-red-500 @enderror">
        @error('arival_time')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <input type="hidden" name="airplane_id" value="{{ $airplane_id }}">
    <div class="form-group my-2">
        <button type="submit" class="w-full bg-red-600 text-white py-2">Create Schedule</button>
    </div>
</form>
