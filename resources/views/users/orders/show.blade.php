<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between align-items-center">
                        <div class="grid p-6 justify-items-end">
                            <h1 class="mb-4 text-2xl font-bold text-center">Order Number : {{ $order->id }}</h1>
                        </div>
                        <div class="grid p-6 space-y-3 justify-items-end">
                            <p>Order Status : <span class="font-bold">@if($order->paid()) Complete @else Incomplete @endif</span></p>                                    
                            @if(!$order->paid())
                            <a href="{{ route('my-orders.pay', $order->id) }}">
                                <button class="btn">Complete Order</button>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        @foreach($orderItems as $product)
                        <div class="mb-8 rounded-md">
                            <div class="flex justify-between p-6 border-2 border-b-0">
                                <div>
                                    <p class="font-bold">
                                        {{ $product->name }}
                                    </p>
                                    <hr class="mb-4">
                                    <a href="{{ route('store.show', ['product' => $product->slug]) }}">
                                        <img src="@if (file_exists('storage/' . $product->image)) {{ asset('storage/' . $product->image) }} @else {{ $product->image }} @endif" alt="{{ $product->name }}" width="100"
                                            height="100">
                                    </a>
                                </div>
                                <div class="flex items-end space-x-4">
                                    <p>Unit Price : <span class="font-bold">${{ $product->showPrice() }}</span></p>
                                    @foreach($order->products as $item)
                                        @if($item->id == $product->id)
                                        <p>Quantity : <span class="font-bold">{{ $item->pivot->quantity }}</span></p>
                                        <p>Subtotal : <span class="font-bold">${{number_format($product->price * $product->pivot->quantity, 2)}}</span></p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr class="mb-4">
                    <h1 class="mb-4 text-2xl font-bold text-center">Total Price : ${{ number_format($order->amount, 2) }}</h1>
                    
                </div>
            </div>
        </div>
</x-app-layout>
