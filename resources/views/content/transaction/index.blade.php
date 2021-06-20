<x-app-layout>
    <x-slot name="title">
        List Transaction
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-10">
                        @forelse ($hotel_transactions as $hotel_transaction)
                        <div class=" w-full lg:max-w-full lg:flex my-5 py-5  border border-gray-400">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/mountain.jpg')" title="Mountain">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <div class=" flex flex-col justify-between leading-normal">
                              <div class="mb-8">
                                <h1 class="text-2xl">{{ $hotel_transaction->invoice }}</h1>
                                <p class="text-sm text-gray-600 flex items-center">
                                  <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                  </svg>
                                  {{ $hotel_transaction->created_at->diffForHumans() }}
                                </p>
                                <div class="text-gray-900 font-bold text-xl mb-2">Transaction By</div>
                                <p class="text-gray-700 text-base">Mr. {{ $hotel_transaction->user->name }}</p>
                              </div>
                              <div class="flex items-center">

                                <div class="text-sm">
                                  <p class="text-gray-900 leading-none"></p>
                                  <p class="text-gray-600">
                                      <a href="{{ route('hotel.transaction.show', $hotel_transaction) }}" class="bg bg-red-600 hover:bg-red-500 text-white py-2 px-5 rounded">Read</a>
                                  </p>
                                </div>
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
