<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Nordic Shop: Tailwind Toolbox</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        @for ($i = 1; $i < $slides->count(); $i++)#carousel-{{ $i }}:checked~.control-{{ $i }},
        @endfor#carousel-{{ $slides->count() }}:checked~.control-{{ $slides->count() }} {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        @for ($i = 1; $i < $slides->count(); $i++)#carousel-{{ $i }}:checked~.control-{{ $i }}~.carousel-indicators li:nth-child({{ $i }}) .carousel-bullet,
        @endfor#carousel-{{ $slides->count() }}:checked~.control-{{ $slides->count() }}~.carousel-indicators li:nth-child({{ $slides->count() }}) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }

        /* -----
SVG Icons - svgicons.sparkk.fr
----- */

.svg-icon {
  width: 1em;
  height: 1em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #4691f6;
}

.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}

    </style>

</head>

<body class="text-base leading-normal tracking-normal text-gray-600 bg-white work-sans">

    <!--Nav-->
    <x-navbar />

    <div class="container relative mx-auto carousel" style="max-width:1600px;">
        <div class="relative w-full overflow-hidden carousel-inner">
            @foreach ($slides as $slide)
                <input class="carousel-open" type="radio" id="carousel-{{ $loop->index + 1 }}" name="carousel"
                    aria-hidden="true" hidden="" checked="{{ $loop->index == 0 ? 'checked' : '' }}">
                <div class="absolute opacity-0 carousel-item" style="height:50vh;">
                    <div class="flex block w-full h-full pt-6 mx-auto bg-right bg-cover md:pt-0 md:items-center"
                        style="background-image: url('{{ url($slide->image) }}');">

                        <div class="container mx-auto">
                            <div
                                class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                                <p class="my-4 text-2xl text-black">{{ $slide->name }}</p>
                                <a class="inline-block text-xl leading-relaxed no-underline border-b border-gray-600 hover:text-black hover:border-black"
                                    href="#">view product</a>
                            </div>
                        </div>

                    </div>
                </div>

                <label for="carousel-{{ $loop->index == 0 ? $slides->count() : $loop->index }}"
                    class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-{{ $loop->index + 1 }} md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
                <label for="carousel-{{ $loop->index == $slides->count() - 1 ? 1 : $loop->index + 2 }}"
                    class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-{{ $loop->index + 1 }} md:mr-10 hover:text-white hover:bg-gray-900">›</label>
            @endforeach

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                @foreach ($slides as $slide)
                    <li class="inline-block mr-3">
                        <label for="carousel-{{ $loop->index + 1 }}"
                            class="block text-4xl text-gray-400 cursor-pointer carousel-bullet hover:text-gray-900">•</label>
                    </li>
                @endforeach
            </ol>

        </div>
    </div>

    <!--	 

Alternatively if you want to just have a single hero

<section class="flex w-full pt-12 mx-auto bg-right bg-cover bg-nordic-gray-light md:pt-0 md:items-center" style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

 <div class="container mx-auto">

  <div class="flex flex-col items-start justify-center w-full px-6 tracking-wide lg:w-1/2">
   <h1 class="my-4 text-2xl text-black">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
   <a class="inline-block text-xl leading-relaxed no-underline border-b border-gray-600 hover:text-black hover:border-black" href="#">products</a>

  </div>

 </div>

</section>

-->

    <section class="py-8 bg-white">

        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

            <nav id="store" class="top-0 z-30 w-full px-6 py-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                        href="{{ route('store.index') }}">
                        Products
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>

            @foreach ($products as $product)
                <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4">
                    <a href="{{ route('store.show', ['product' => $product->slug]) }}">
                        <img class="hover:grow hover:shadow-lg" src="{{ url($product->image) }}">
                        <div class="flex items-center justify-between pt-3">
                            <p class="">{{ $product->name }}</p>
                            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-gray-900">£{{ $product->showPrice() }}</p>
                    </a>
                </div>
            @endforeach

        </div>

    </section>

    <section class="py-8 bg-white">

        <div class="container px-6 py-8 mx-auto">

            <a class="mb-8 text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline" href="#">
			About
		</a>

            <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in particular:
                <br>
                <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900" href="https://nordicmade.com/">https://nordicmade.com/</a> and <a class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a></p>

            <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>

        </div>

    </section>
    
    <x-footer />


</body>

</html>
