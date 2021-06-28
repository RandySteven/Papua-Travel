<x-app-layout>
    <x-slot name="title">
        Create Diary
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="w-full border-black">
                        </div>
                        <div class="form-group my-2">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="w-full border-black">
                        </div>
                        <div class="form-group my-2">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="w-full border-black">
                        </div>
                        <div class="form-group my-2">
                            <label for="title">Description</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
