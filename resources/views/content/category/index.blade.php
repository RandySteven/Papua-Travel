<x-app-layout>
    <x-slot name="title">
        Categories
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <div  class="py-2 w-full bg-green-700 hover:bg-green-600 my-2 text-center text-white">
                                <a href="{{ route('category.create') }}">Create Category</a>
                            </div>
                        @endif
                    @endauth

                    <ul>
                        @forelse ($categories as $category)
                        <li>
                            <a href="{{ route('category.show', $category) }}">{{ $category->category }}</a>
                        </li>
                        @empty
                            <x-session></x-session>
                        @endforelse
                    </ul>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
