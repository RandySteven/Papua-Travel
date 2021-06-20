<form action="{{ route('seat.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group my-2">
        <label for="seat" class="w-full">Seat</label>
        <input type="text" name="seat" id="seat" class="w-full rounded @error('seat') border-red-500 @enderror">
        @error('seat')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <input type="hidden" name="airplane_id" value="{{ $airplane_id }}">
    <div class="form-group my-2">
        <button type="submit" class="w-full bg bg-red-500 text-white py-2">Create</button>
    </div>
</form>
