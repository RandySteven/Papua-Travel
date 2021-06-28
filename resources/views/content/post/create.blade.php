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
                            <input type="text" name="title" id="title" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="activity_start">Activity Start</label>
                            <input type="date" name="activity_start" id="activity_start" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="activity_end">Activity End</label>
                            <input type="date" name="activity_end" id="activity_end" class="w-full rounded">
                        </div>
                        <div class="form-group my-2">
                            <label for="places">Places</label>
                            <div class="grid grid-cols-2">
                                @foreach ($places as $place)
                                    <input type="checkbox" name="places[]" id="places">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="w-full rounded" rows="10"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
