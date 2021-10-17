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
        </style>
    </head>
    <body class="text-base leading-normal tracking-normal text-gray-600 bg-white work-sans">
        
        <!--Nav-->
        <x-navbar />

        {{ $slot }}

        <x-footer />
        
    </body>
</html>
