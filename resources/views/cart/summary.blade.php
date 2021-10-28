@inject('cost', 'App\Service\Cost\Contracts\CostInterface')

<div class="p-4 bg-gray-100 rounded-full">
    <h1 class="ml-2 font-bold uppercase">Order Details</h1>
</div>
<div class="p-4">
    <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you
        have entered</p>
    @foreach ($cost->getSummary() as $description => $price)
    <div class="flex justify-between border-b">
        <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
            {{ $description }}
        </div>
        @if($description == "Discount")
        <div class="m-2 font-bold text-center text-green-700 lg:px-4 lg:py-2 lg:text-lg">
            $-{{ number_format($price) }}
        </div> 
        @else
        <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
            ${{ number_format($price) }}
        </div>
        @endif
    </div>        
    @endforeach

    <div class="flex justify-between pt-4 border-b">
        <div class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl">
            Total
        </div>
        <div class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg">
            ${{ number_format($cost->getTotalCosts()) }}
        </div>
</div>
