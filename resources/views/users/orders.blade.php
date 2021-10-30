<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Orders History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($orders as $order)
                        <div class="mb-8 rounded-md">
                            <div class="flex justify-between p-6 border-2 border-b-0">
                                <div>
                                    <p class="font-bold">{{ $order->created_at->format('m/d/Y') }} -
                                        {{ $order->id }}</p>
                                    <hr class="my-1">
                                    <p>Total Amount : <span class="font-bold">${{ $order->amount }}</span></p>
                                </div>
                                <div class="flex items-center">
                                    <a href="#" class="pr-2 text-blue-500">
                                        Order Details
                                    </a>
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path
                                            d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 border-2">
                                <p class="font-bold">
                                    Order Items
                                </p>
                                <div class="flex gap-4 mt-4 auto-rows-auto">
                                    @foreach ($order->products as $product)
                                        <a href="{{ route('store.show', ['product' => $product->slug]) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" width="100"
                                                height="100">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
