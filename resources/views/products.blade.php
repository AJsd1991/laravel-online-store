@extends('layouts.product')

@section('content')

<section class="py-8 bg-white">

    <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

        <nav id="store" class="top-0 z-30 w-full px-6 py-1">
            <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline " href="#">
            Store
        </a>

                <div class="flex items-center" id="store-nav-content">

                    <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                        </svg>
                    </a>

                    <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                        </svg>
                    </a>

                </div>
          </div>
        </nav>

        @foreach ($products as $product)
            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4">
                <a href="{{ route('store.show', ['product' => $product->slug]) }}">
                    <img class="hover:grow hover:shadow-lg" src="https://dkstatics-public.digikala.com/digikala-products/123f8560637d5909f1437a67b06372b24ab42ea4_1629012496.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">{{ $product->name }}</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-gray-900">£{{ $product->showPrice() }}</p>
                </a>
            </div>                
        @endforeach


        </div>

</section>
    
@endsection
