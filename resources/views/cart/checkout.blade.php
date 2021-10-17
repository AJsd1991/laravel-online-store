@inject('cart', 'App\Service\Cart\Cart')

<x-store-layout>

    <div class="justify-between my-4 mt-6 -mx-2 lg:flex">
        <div class="ml-20 lg:px-2 lg:w-1/3">
            <ul class="px-0 mb-20">
                <li class="px-3 py-3 text-white list-none bg-gray-800 border rounded-sm" style='border-bottom-width:0'>
                    Costomer Information</li>
                <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>Name :
                    {{ Auth::user()->name }}</li>
                <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>Email :
                    {{ Auth::user()->email }}</li>
            </ul>

            <form action="{{ route('cart.checkout') }}" id='checkout-form' method="post">
                @csrf
                <ul class="px-0">
                    <li class="px-3 py-3 text-white list-none bg-gray-800 border rounded-sm" style='border-bottom-width:0'>
                        Payment Information</li>
                    <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>
                        <div class="flex justify-between">
                            <div>
                                <input type="radio" id="online" value="online" name="method">
                                <label class="" for="online">
                                    Online
                                </label>
                            </div>
                            <div>
                                <select name='gateway' class="">
                                    <option disabled="disabled" selected="selected">Choose Gateway</option>
                                    <option value="saman">Saman</option>
                                    <option value="pasargad">Pasargad</option>
                                </select>
                            </div>
                        </div>
                    </li>


                    <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'">

                            <input type="radio" id="cash" value="cash" name="method">
                        <label for="cash">
                            Cash
                        </label>
                    </li>
                    <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'">
                            <input type="radio" id="card" value="card" name="method">
                        <label for="card">
                            Card
                        </label>
                    </li>
                </ul>
            </form>
            @if ($errors->any())
                <ul class="mt-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li class='text-red-500'>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="mr-20 lg:px-2 lg:w-1/3">
            <div class="p-4 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Order Details</h1>
            </div>
            <div class="p-4">
                <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p>
                <div class="flex justify-between border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
                        Subtotal
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
                        ${{ $cart->subTotal() }}
                    </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                    <div class="flex m-2 text-lg font-bold text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
                        <form action="" method="POST">
                            <button type="submit" class="mt-1 mr-2 lg:mt-2">
                                <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt"
                                    class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z" />
                                </svg>
                            </button>
                        </form>
                        Coupon "90off"
                    </div>
                    <div class="m-2 font-bold text-center text-green-700 lg:px-4 lg:py-2 lg:text-lg">
                        -133,944.77€
                    </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
                        New Subtotal
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
                        14,882.75€
                    </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
                        Tax
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
                        2,976.55€
                    </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                    <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
                        Total
                    </div>
                    <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
                        17,859.3€
                    </div>
                </div>
                <a onclick="document.getElementById('checkout-form').submit()">
                    <button
                        class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">

                        <span class="ml-2 mt-5px">PURCHASE</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

</x-store-layout>
