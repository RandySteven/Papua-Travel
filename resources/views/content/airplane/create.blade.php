<x-app-layout>
    <x-slot name="title">
        Create Airplane
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('airplane.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="airplane_name" class="w-full">Airplane Name</label>
                            <input type="text" name="airplane_name" id="airplane_name" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="airplane_description" class="w-full">Airplane Description</label>
                            <textarea name="airplane_description" id="airplane_description" class="w-full" rows="10"></textarea>
                        </div>
                        <div class="form-group my-2">
                            <label for="airplane_image" class="w-full">Airplane Image</label>
                            <input type="file" name="airplane_image" id="airplane_image" class="w-full">
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="w-full bg bg-red-500 text-white py-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
