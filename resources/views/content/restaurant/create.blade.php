<x-app-layout>
    <x-slot name="title">
        Create Restaurant
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('restaurant.store') }}" class="w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- $table->string('restaurant_name');
                        $table->text('restaurant_address');
                        $table->string('restaurant_image');
                        $table->text('restaurant_description');
                        $table->string('daysOpen');
                        $table->time('time_open');
                        $table->time('time_close');
                        $table->string('slug');
                        $table->foreignId('categoryId')->constrained('categories')->onDelete('cascade')->onUpdate('cascade'); --}}
                        <div class="form-group my-2">
                            <label for="restaurant_name" class="w-full">Restaurant Name</label>
                            <input type="text" name="restaurant_name" id="restaurant_name" class="w-full rounded @error('restaurant_name') border-red-600 @enderror">
                            @error('restaurant_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="restaurant_address" class="w-full">Restaurant Address</label>
                            <textarea name="restaurant_address" class="w-full rounded @error('restaurant_address') border-red-600 @enderror" id="" rows="5"></textarea>
                            @error('restaurant_address')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="restaurant_image" class="w-full">Restaurant Image</label>
                            <input type="file" name="restaurant_image" id="restaurant_image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="restaurant_description" class="w-full">Restaurant Description</label>
                            <textarea name="restaurant_description" class="w-full rounded @error('restaurant_description') border-red-600 @enderror" id="" rows="5"></textarea>
                            @error('restaurant_description')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="daysOpen" class="w-full">Days Open</label>
                            <select name="daysOpen[]" multiple id="" class="w-full js-example-basic-multiple-limit @error('daysOpen') border-red-600 @enderror">
                                <?php
                                $daysOpen = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');

                                for ($i = 0; $i < count($daysOpen); $i++){
                                ?>
                                    <option value="<?php echo $daysOpen[$i]?>"><?php echo $daysOpen[$i]?></option>
                                <?php } ?>
                            </select>
                            @error('daysOpen')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2 col-span-6">
                            <div class="form-group my-2 w-1/2">
                                <label for="time_open" class="w-full">Time Open</label>
                                <input type="time" name="time_open" id="time_open" class="w-full rounded @error('time_open') border-red-600 @enderror">
                            </div>
                            <div class="form-group my-2 w-1/2">
                                <label for="time_close" class="w-full">Time Close</label>
                                <input type="time" name="time_close" id="time_close" class="w-full rounded @error('time_close') border-red-600 @enderror">
                                @error('time_close')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <label for="categoryId" class="w-full">Category</label>
                            <select name="categoryId" class="w-full @error('categoryId') border-red-600 @enderror" id="categoryId">
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error('categoryId')
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
