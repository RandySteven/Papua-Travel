<form action="{{ route('schedule.controller') }}" method="post">
    @csrf
    <div class="form-group my-2">
        <label for="departure_location" class="w-full">Departure Location</label>
        <input type="text" name="departure_location" id="departure_location" class="w-full">
    </div>
    <div class="form-group my-2">
        <label for="schedule_date">Schedule Date</label>
        <input type="date" name="schedule_date" id="schedule_date" class="w-full">
    </div>
    <div class="form-group my-2">
        <label for="schedule_time">Schedule Time</label>
        <input type="time" name="schedule_time" id="schedule_time" class="schedule_time">
    </div>
    <div class="form-group my-2">
        <label for="arival_time">Arival Time</label>
        <input type="time" name="arival_time" id="arival_time" class="w-full">
    </div>
    <input type="hidden" name="airplane_id" value="{{ $airplane_id }}">
    <div class="form-group my-2">
        <button type="submit" class="w-full bg-red-600 text-white py-2">Create Schedule</button>
    </div>
</form>
