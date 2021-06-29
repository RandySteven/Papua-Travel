<x-app-layout>
    <x-slot name="title">
        Forums
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
                    <div class="grid grid-cols-3">
                        @forelse ($forums as $forum)
                            <div>
                                <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
                                    <div class="flex justify-center md:justify-end -mt-16">
                                      <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{ asset('storage/'.$forum->thumbnail) }}">
                                    </div>
                                    <div>
                                      <h2 class="text-gray-800 text-3xl font-semibold">{{ $forum->forum_title }}</h2>
                                      <p class="mt-2 text-gray-600">{{ Str::limit($forum->body, 202, '...') }}
                                        <a href="{{ route('forum.show', $forum) }}" class="text-blue-500 hover:text-blue-600">Read More</a>
                                        </p>
                                    </div>
                                    <div class="flex justify-end mt-4">
                                      <a href="#" class="text-xl font-medium text-indigo-500">{{ $forum->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <x-session></x-session>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
