<x-app-layout>
    <x-slot name="title">
        Packages
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($packages as $package)
                    <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
                        <div>
                          <h2 class="text-gray-800 text-3xl font-semibold">{{ $package->title }}</h2>
                          <p class="mt-2 text-gray-600">{{ Str::limit($package->description, 20, '...') }}</p>
                          <p>{{ $package->expired }}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('holiday.package.show', $package) }}" class="text-xl font-medium text-indigo-500">Read Detail</a>
                            <a href="{{ route('holiday.package.order', $package) }}" class="text-xl font-medium text-indigo-500">Order</a>
                        </div>
                    </div>
                    @empty
                        <x-session></x-session>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
