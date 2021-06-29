<x-app-layout>
    <x-slot name="title">
        Create Forum
    </x-slot>

    <x-slot name="style">
        <style>
            body{
                background-color: maroon;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('forum.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                            <label for="forum_title">Forum Title</label>
                            <input type="text" name="forum_title" id="forum_title" class="w-full rounded">
                        </div>

                        <div class="form-group my-2">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="w-full">
                        </div>

                        <div class="form-group my-2">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="w-full rounded" rows="10"></textarea>
                        </div>
{{--
                        <div class="form-group my-2">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="w-full rounded js-example-basic-multiple-limit" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                        </div> --}}


                        <div class="form-group my-2">
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
