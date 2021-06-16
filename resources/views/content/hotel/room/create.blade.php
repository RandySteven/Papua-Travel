<form action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hotel_id" value="{{ $hotel_id }}">
    <div class="form-group my-2">
        <label for="room_number" class="w-full">Room Name</label>
        <input type="text" name="room_number" id="room_number" class="w-full rounded">
        @error('room_number')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="room_image" class="w-full">Room Image</label>
        <input type="file" name="room_image" id="room_image" class="w-full rounded">
        @error('room_image')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="floor" class="w-full">Floor</label>
        <input type="text" name="floor" id="floor" class="w-full rounded">
        @error('floor')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="room_price_pernight" class="w-full">Room Price per Night</label>
        <input type="text" name="room_price_pernight" id="room_price_pernight" class="w-full rounded">
        @error('room_price_pernight')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="beds" class="w-full">Beds</label>
        <select name="beds" id="beds" class="w-full">
            @php
                $beds = array('Double Bed', 'King Bed', 'Single Bed', 'Extra Bed')
            @endphp

            @for ($i = 0 ; $i < count($beds) ; $i++)
                <option value="{{ $beds[$i] }}">{{ $beds[$i] }}</option>
            @endfor
        </select>
        @error('beds')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <button type="submit" class="w-full bg bg-red-500 text-white py-2">Create</button>
    </div>

</form>
