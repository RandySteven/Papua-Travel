<x-app-layout>
    <x-slot name="title">
        {{ $forum->forum_title }}
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
                    <img src="{{ asset('storage/'.$forum->thumbnail) }}" alt="">
                    <h2 class="text-3xl">{{ $forum->forum_title }}</h2>
                    <p class="text-gray-500">{{ $forum->user->name }}</p>
                    <p class="text-gray-500">{{ $forum->created_at->diffForHumans() }}</p>
                    <p>{!! nl2br($forum->body) !!}</p>

                    <div class="my-5">
                        @include('content.forums.comment.comment', ['comments'=>$forum->comments, 'forum_id' => $forum->id])
                    </div>
                    @guest
                        To comment this diary please <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-400">login</a>
                    @else
                    <div class="p-6">
                        <form action="{{ route('comment') }}" method="POST">
                            @csrf
                            <div class="flex mb-3">
                                <x-label>{{ Auth::user()->name }}</x-label>
                            </div>
                            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                            <textarea name="comment" id="comment" class="w-full inline-block" rows="10"></textarea>
                            <button type="submit" class="px-2 py-1 bg-red-700 hover:bg-red-600 text-white">Submit</button>
                        </form>
                    </div>
                @endguest
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
