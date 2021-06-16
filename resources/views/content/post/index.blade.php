<x-app-layout>
    <x-slot name="title">
        Diaries
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($posts as $post)

                    @empty
                        <x-session></x-session>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
