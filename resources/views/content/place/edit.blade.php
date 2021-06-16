<x-app-layout>
    <x-slot name="title">
        Create Diary
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('place.store') }}" class="w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="place_name" class="w-full">Place Name</label>
                            <input type="text" name="place_name" value="{{ $place->place_name }}" id="place_name" class="w-full rounded @error('place_name') border-red-600 @enderror">
                            @error('place_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="place_location" class="w-full">Place Location</label>
                            <textarea name="place_location" class="w-full rounded @error('place_location') border-red-600 @enderror" id="" rows="5">{{ $place->place_location }}</textarea>
                            @error('place_location')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="place_image" class="w-full">Place Image</label>
                            <input type="file" name="place_image" id="place_image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="place_description" class="w-full">Place Description</label>
                            <textarea name="place_description" class="w-full rounded @error('place_description') border-red-600 @enderror" id="" rows="5">{{ $place->place_description }}</textarea>
                            @error('place_description')
                                <span class="text-red-600">{{ $message }}}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 w-full text-white text-center py-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
