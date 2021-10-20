@inject('cart', 'App\Service\Cart\Cart')

<x-store-layout>

    <div class="justify-between my-4 mt-6 -mx-2 lg:flex">
        <div class="ml-20 lg:px-2 lg:w-1/3">
            <ul class="px-0 mb-20">
                <li class="px-3 py-3 text-white list-none bg-gray-800 border rounded-sm" style='border-bottom-width:0'>
                    Costomer Information</li>
                <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>Name :
                    {{ Auth::user()->name }}</li>
                <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>Phone Number :
                    {{ Auth::user()->phone_number }}</li>
                <li class="px-3 py-3 list-none border rounded-sm" style='border-bottom-width:0'>Address :
                    {{ Auth::user()->address }}</li>
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
        <div class="mr-20 lg:px-2 lg:w-1/2">
                @include('cart.summary')
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
