@extends('layouts.product')

@section('content')

<div class="container px-6 mx-auto">
    <div class="md:flex md:items-center">
        <div class="w-full h-full md:w-1/2 lg:h-full">
            <img class="object-cover w-full h-full max-w-lg mx-auto rounded-md"
                src="{{ asset('storage/' . $product->image) }}"
                alt="Nike Air">
        </div>
        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-lg text-gray-700 uppercase">{{ $product->name }}</h3>
            <span class="mt-3 text-gray-500">تومان{{ $product->showPrice() }}</span>
            <hr class="my-3">
            <div class="mt-2">
                <label class="text-sm text-gray-700" for="count">Count:</label>
                <div class="flex items-center mt-1">
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <span class="mx-2 text-lg text-gray-700">20</span>
                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <label class="text-sm text-gray-700" for="count">Color:</label>
                <div class="flex items-center mt-1">
                    <button
                        class="w-5 h-5 mr-2 bg-blue-600 border-2 border-blue-200 rounded-full focus:outline-none"></button>
                    <button class="w-5 h-5 mr-2 bg-teal-600 rounded-full focus:outline-none"></button>
                    <button class="w-5 h-5 mr-2 bg-pink-600 rounded-full focus:outline-none"></button>
                </div>
            </div>
            <div class="flex items-center mt-6">
                <button
                    class="px-8 py-2 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Order
                    Now</button>
                <button class="p-2 mx-2 text-gray-600 border rounded-md hover:bg-gray-200 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="flex pt-6 pl-6">
        @foreach (json_decode($product->images) as $image)
            <img class="object-cover h-20 max-w-lg m-5 rounded-md w-30"
                src="{{ asset('storage/' . $image) }}"
                alt="Nike Air">
        @endforeach
    </div>
    <div class="mt-16">
        <h3 class="text-2xl font-medium text-gray-600">More Products</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($moreProducts as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <div class="flex items-end justify-end w-full h-56 bg-cover"
                    style="background-image: url('https://lh3.googleusercontent.com/proxy/jJXdsfiTvZ9qWINQ-gQhOnIWnz8ZVDIXw_fEsAMg_mj6ZLTpU5aJaA4QJYEJj7sC7b8NHPkboWdD9L5Ygyo0Z0TAZtbraSJmh_FVCAXvZWssLe49FoCMvbUeluN73RT-R7AXFvI')">
                    <button
                        class="p-2 mx-5 -mb-4 text-white bg-blue-600 rounded-full hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->showPrice() }}</span>
                </div>
            </div>                    
            @endforeach
        </div>
    </div>
</div>
    
@endsection