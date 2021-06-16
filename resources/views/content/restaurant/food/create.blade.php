<form action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="restaurantId" value="{{ $restaurantId }}">
    <div class="form-group my-2">
        <label for="food_name" class="w-full">Food Name</label>
        <input type="text" name="food_name" id="food_name" class="w-full rounded @error('food_name') border-red-600 @enderror">
        @error('food_name')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="food_image" class="w-full">Food Image</label>
        <input type="file" name="food_image" id="food_image" class="w-full rounded @error('food_image') border-red-600 @enderror">
        @error('food_image')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="food_price" class="w-full">Food Price</label>
        <input type="text" name="food_price" id="food_price" class="w-full rounded @error('food_price') border-red-600 @enderror">
        @error('food_price')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <label for="food_description" class="w-full">Food Description</label>
        <textarea name="food_description" id="food_description" class="w-full @error('food_description') border-red-600 @enderror" rows="10"></textarea>
        @error('food_description')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group my-2">
        <button type="submit" class="w-full bg bg-red-500 text-white py-2">Create</button>
    </div>

</form>
