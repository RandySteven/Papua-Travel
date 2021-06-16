<x-app-layout>
    <x-slot name="title">
        Create Tradition
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="#" class="w-full" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="tradition_name" class="w-full">Tradition Name</label>
                            <input type="text" name="tradition_name" id="tradition_name" class="w-full rounded @error('tradition_name') border-red-600 @enderror">
                            @error('tradition_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group my-2">
                            <label for="tradition_image" class="w-full">Tradition Image</label>
                            <input type="file" name="tradition_image" id="tradition_image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="tradition_description" class="w-full">Tradition Description</label>
                            <textarea name="tradition_description" class="w-full rounded @error('tradition_description') border-red-600 @enderror" id="" rows="5"></textarea>
                            @error('tradition_description')
                                <span class="text-red-600">{{ $message }}}</span>
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
