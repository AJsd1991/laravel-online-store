@inject('cart', 'App\Service\Cart\Cart' )

<nav id="header" class="top-0 z-30 w-full py-1">
    <div class="container flex flex-wrap items-center justify-between w-full px-6 pt-3 mx-auto mt-0">
        <div class="relative order-2 w-1/2 pt-2 text-gray-600 md:mr-96 md:order-2">
            <form action="{{ route('search') }}" method="GET">
                <input
                    class="h-10 px-5 pr-16 text-sm bg-white border-2 border-gray-300 rounded-lg md:w-full focus:outline-none"
                    type="search" name="q" placeholder="Search" value="{{ request('q') }}">
                <button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
                    <svg class="w-4 h-4 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="order-1 md:order-1">
            <a class="flex items-center text-xl font-bold tracking-wide text-gray-800 no-underline hover:no-underline "
                href="{{ route('home.landing') }}">
                <svg class="mr-2 text-gray-800 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path
                        d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                Store
            </a>
        </div>

        <div class="flex items-center order-2 md:order-3" id="nav-content">
            @guest
                <a class="flex items-center inline-block gap-4 no-underline hover:text-black hover:bg-white btn-outline btn"
                    href="{{ route('login') }}">
                    <p>Please Login</p>
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <circle fill="none" cx="12" cy="7" r="3" />
                        <path
                            d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                    </svg>
                </a>
            @else
                <div class="dropdown">
                    <div>
                        <button type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path
                                    d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg>
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg dropdown-content ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <p class="block px-4 text-lg text-gray-700" role="menuitem" tabindex="-1">
                                {{ auth()->user()->name }}</p>
                            <div class="flex items-center">
                                <a href="{{ route('dashboard') }}" class="block py-2 pl-4 pr-2 text-sm text-blue-500"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Dashboard</a>
                                <svg class="svg-icon" viewBox="0 0 20 20">
                                    <path
                                        d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="py-1" role="none">
                            <a href="{{ route('my-orders.index') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-4">My Orders</a>
                        </div>
                        <div class="py-1" role="none">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="menu-item-6">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endguest

            <a class="inline-block pl-3 no-underline hover:text-black" href="{{ route('cart.index') }}">

                <button
                    class="relative px-1 py-4 text-gray-800 transition duration-150 ease-in-out border-2 border-transparent rounded-full hover:text-gray-400 focus:outline-none focus:text-gray-500"
                    aria-label="Cart">
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                    <span class="absolute inset-0 object-right-top -mr-6">
                        <div
                            class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                            {{ $cart->itemCount() }}
                        </div>
                    </span>
                </button>
            </a>

        </div>
    </div>
    <div class="container flex flex-wrap items-start justify-between w-full px-6 py-3 mx-auto mt-0">

        <div>
            <ul class="flex flex-wrap items-center w-full h-10">
                <li class="relative block" x-data="{showChildren:false}" @click.away="showChildren=false">
                    <a href="#"
                        class="flex items-center h-10 px-0 mx-1 leading-10 no-underline transition-colors duration-100 rounded cursor-pointer hover:no-underline hover:bg-gray-100"
                        @click.prevent="showChildren=!showChildren">
                        <span class="mr-3 text-xl"> <svg class="text-gray-900 fill-current"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <title>menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                            </svg> </span>
                        <span>All Categories</span>
                        <span class="ml-2"> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="absolute left-0 top-auto z-30 w-56 min-w-full mt-1 text-sm bg-white border border-gray-300 rounded shadow-md"
                        x-show="showChildren" x-transition:enter="transition ease duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease duration-300 transform"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
                        <span
                            class="absolute top-0 left-0 w-3 h-3 ml-6 -mt-1 transform rotate-45 bg-white border"></span>
                        <div class="relative z-10 w-full py-1 bg-white rounded">
                            <ul class="list-reset">
                                @foreach ($categories as $category)
                                    <li class="relative" x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false" @mouseenter="showChildren=true">
                                        <a href="{{ route('store.index', ['category' => $category->slug]) }}"
                                            class="flex items-start w-full px-4 py-2 no-underline transition-colors duration-100 cursor-pointer hover:bg-gray-100 hover:no-underline">
                                            <span class="flex-1">{{ $category->name }}</span>
                                            <span class="ml-2"> <i class="mdi mdi-chevron-right"></i> </span>
                                        </a>
                                        <div class="absolute top-0 z-30 w-56 min-w-full mt-1 text-sm bg-white border border-gray-300 rounded shadow-md inset-l-full"
                                            x-show="showChildren"
                                            x-transition:enter="transition ease duration-300 transform"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease duration-300 transform"
                                            x-transition:leave-start="opacity-100 translate-y-0"
                                            x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
                                            <span
                                                class="absolute top-0 left-0 w-3 h-3 mt-2 -ml-1 transform rotate-45 bg-white border"></span>
                                            <div class="relative z-10 w-full py-1 bg-white rounded">
                                                <ul class="list-reset">
                                                    @foreach ($category->children as $subCategory)
                                                        <li>
                                                            <a href="#"
                                                                class="flex items-start w-full px-4 py-2 no-underline transition-colors duration-100 cursor-pointer hover:bg-gray-100 hover:no-underline">
                                                                <span
                                                                    class="flex-1">{{ $subCategory->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="flex items-center order-2" id="nav-content">
            <a class="inline-block pl-3 no-underline hover:text-black" href="{{ route('cart.index') }}">
                Please Select Your Address
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>

        </div>
    </div>
</nav>

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

    /*
module.exports = {
    plugins: [
        require('tailwindcss-inset')({
            insets: {
                full: '100%'
            }
        })
    ]
};
*/
    .inset-l-full {
        left: 100%;
    }

</style>
