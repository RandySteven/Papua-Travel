<x-app-layout>
    <x-slot name="title">
        Create Hotel
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('hotel.store') }}" class="w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="hotel_name" class="w-full">Hotel Name</label>
                            <input type="text" name="hotel_name" id="hotel_name" class="w-full rounded @error('hotel_name') border-red-600 @enderror">
                            @error('hotel_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_address" class="w-full">Hotel Address</label>
                            <textarea name="hotel_address" class="w-full rounded @error('hotel_address') border-red-600 @enderror" id="" rows="5"></textarea>
                            @error('hotel_address')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_image" class="w-full">Hotel Image</label>
                            <input type="file" name="hotel_image" id="hotel_image" class="w-full rounded">
                            @error('hotel_image')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="hotel_description" class="w-full">Hotel Description</label>
                            <textarea name="hotel_description" class="w-full rounded @error('hotel_description') border-red-600 @enderror" id="" rows="5"></textarea>
                            @error('hotel_description')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="ratingId" class="w-full">Rating</label>
                            <select name="ratingId" class="w-full @error('ratingId') border-red-600 @enderror" id="ratingId">
                                <option value="">Select Rating</option>
                                @foreach ($ratings as $rating)
                                    <option value="{{ $rating->id }}">{{ $rating->rating_score }}</option>
                                @endforeach
                            </select>
                            @error('ratingId')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
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
