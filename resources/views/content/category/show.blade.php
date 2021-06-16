<x-app-layout>
    <x-slot name="title">
        {{ $category->category }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>{{ $category->category }}</h2>
                    <ul>
                        @forelse ($restaurants as $restaurant)
                        <li>
                            <a href="{{ route('restaurant.show', $restaurant) }}">{{ $restaurant->restaurant_name }}</a>
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
