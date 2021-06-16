<x-app-layout>
    <x-slot name="title">
        {{ $restaurant->restaurant_name }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('storage/'.$restaurant->restaurant_image) }}" alt="">

                    <h2 class="text-2xl">
                        {{ $restaurant->restaurant_name }}
                    </h2>

                    <p>{!! nl2br($restaurant->restaurant_description) !!}</p>

                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            @include('content.restaurant.food.create', ['restaurantId'=>$restaurant->id])
                        @endif
                    @endauth

                    @include('content.restaurant.food.index', ['foods' => App\Models\Food::where('restaurantId', $restaurant->id)->get()])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
