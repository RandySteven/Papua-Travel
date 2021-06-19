<x-app-layout>
    <x-slot name="title">
        Edit {{ $hotel->hotel_name }}
    </x-slot>

    <x-slot name="style">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("/images/modern-luxury-hotel-office-reception-lounge-with-meeting-room.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('hotel.store') }}" class="w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="hotel_name" class="w-full">Hotel Name</label>
                            <input type="text" name="hotel_name" id="hotel_name" value="{{ $hotel->hotel_name }}" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_address" class="w-full">Hotel Address</label>
                            <textarea name="hotel_address" class="w-full rounded" id="hotel_address" rows="5">{{ $hotel->hotel_address }}</textarea>
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_image" class="w-full">Hotel Image</label>
                            <input type="file" name="hotel_image" id="hotel_image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_description" class="w-full">Hotel Description</label>
                            <textarea name="hotel_description" class="w-full rounded" id="" rows="5">
                                {{ $hotel->hotel_description }}
                            </textarea>
                        </div>
                        <div class="form-group my-2">
                            <label for="ratingId" class="w-full">Rating</label>
                            <select name="ratingId" class="w-full" id="ratingId">
                                @foreach ($ratings as $rating)
                                    <option value="{{ $rating->id }}" {{ $hotel->ratingId == $rating->id ?
                                    'selected' : '' }}>{{ $rating->rating_score }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 w-full text-white text-center py-3">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
