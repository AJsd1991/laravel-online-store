<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 text-2xl font-bold text-center">Personal Info</h1>
                    <hr>
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <th>Address</th>
                            </tr>
                            <tr>
                                <td>{{ auth()->user()->phone_number ?? '-' }}</td>
                                <td>{{ auth()->user()->address ?? '-'}}</td>
                            </tr>
                        </table>
                        <div class="m-4 text-center">
                            <a href="{{ route('users.edit', auth()->id()) }}">
                                <button class="btn">Edit Info</button>
                            </a>
                        </div>
                        <hr>
                        <h1 class="m-4 text-2xl font-bold text-center">Last Orders</h1>
                        <hr>
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Number</th>
                                        <th>Order Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <th>{{ $loop->iteration}}</th>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('m/d/Y') }}</td>
                                        <td>${{ $order->amount }}</td>
                                        <td>
                                            <a href="{{ route('my-orders.show', $order) }}">
                                                <button class="btn btn-xs">Detail</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
