<x-app-layout>
    <x-slot name="title">
        Edit Category
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        {{-- $table->string('category');
                        $table->string('category_description');
                        $table->string('slug');
                        $table->string('category_image'); --}}
                        <div class="form-group my-2">
                            <label for="category" class="w-full">Category</label>]
                            <input type="text" value="{{ $category->category }}" name="category" id="category" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="category_image" class="w-full">Category Image</label>]
                            <input type="file" name="category_image" id="category_image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="category_description">Category Description</label>
                            <textarea name="category_description" id="category_description" rows="5" class="w-full rounded">{{ $category->category_description }}</textarea>
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="w-full bg bg-red-500 text-white py-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
