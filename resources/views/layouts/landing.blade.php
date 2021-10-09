<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Nordic Shop: Tailwind Toolbox</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        @foreach ($slides as $slide)
        #carousel-{{ $loop->index + 1 }}:checked ~ .control-{{ $loop->index + 1 }},
        @endforeach
        #carousel-{{ $slides->count() }}:checked ~ .control-{{ $slides->count() }} {
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
        
        @foreach ($slides as $slide)
        #carousel-{{ $loop->index + 1 }}:checked ~ .control-{{ $loop->index + 1 }} ~ .carousel-indicators li:nth-child({{ $loop->index + 1 }}) .carousel-bullet,
        @endforeach
        #carousel-{{ $slides->count() }}:checked ~ .control-{{ $slides->count() }} ~ .carousel-indicators li:nth-child({{ $slides->count() }}) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>

</head>

<body class="text-base leading-normal tracking-normal text-gray-600 bg-white work-sans">

    {{-- {{  menu('admin')  }} --}}
    <!--Nav-->

    @include('layouts.navbar')

    <!--Sidebar-->
    <div class="container relative mx-auto carousel" style="max-width:1600px;">
        <div class="relative w-full overflow-hidden carousel-inner">
            @foreach ($slides as $slide)
            <input class="carousel-open" type="radio" id="carousel-{{ $loop->index + 1 }}" name="carousel" aria-hidden="true" hidden="" checked="{{  $loop->index == 0 ? 'checked' : ''}}">
            <div class="absolute opacity-0 carousel-item" style="height:50vh;">
                <div class="flex block w-full h-full pt-6 mx-auto bg-right bg-cover md:pt-0 md:items-center" style="background-image: url('{{ url($slide->image) }}');">

                    <div class="container mx-auto">
                        <div class="flex flex-col items-center w-full px-6 tracking-wide lg:w-1/2 md:ml-16 md:items-start">
                            <p class="my-4 text-2xl text-black">{{ $slide->name }}</p>
                            <a class="inline-block text-xl leading-relaxed no-underline border-b border-gray-600 hover:text-black hover:border-black" href="#">view product</a>
                        </div>
                    </div>

                </div>
            </div>

            <label for="carousel-{{ $loop->index == 0 ? $slides->count() : $loop->index }}" class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer prev control-{{ $loop->index + 1 }} md:ml-10 hover:text-white hover:bg-gray-900">‹</label>
            <label for="carousel-{{ $loop->index == $slides->count() - 1 ? 1 : $loop->index + 2 }}" class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 text-3xl font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-{{ $loop->index + 1 }} md:mr-10 hover:text-white hover:bg-gray-900">›</label>                
            @endforeach


            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                @foreach($slides as $slide)
                <li class="inline-block mr-3">
                    <label for="carousel-{{ $loop->index + 1 }}" class="block text-4xl text-gray-400 cursor-pointer carousel-bullet hover:text-gray-900">•</label>
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

    @yield('content')

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

    <footer class="container py-8 mx-auto bg-white border-t border-gray-400">
        <div class="container flex px-3 py-8 ">
            <div class="flex flex-wrap w-full mx-auto">
                <div class="flex w-full lg:w-1/2 ">
                    <div class="px-3 md:px-0">
                        <h3 class="font-bold text-gray-900">About</h3>
                        <p class="py-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                        </p>
                    </div>
                </div>
                <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                    <div class="px-3 md:px-0">
                        <h3 class="font-bold text-gray-900">Social</h3>
                        <ul class="items-center pt-3 list-reset">
                            <li>
                                <a class="inline-block py-1 no-underline hover:text-black hover:underline" href="#">Add social links</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
