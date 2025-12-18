<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DialySave') }}</title>

    <!-- Fonts -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


<body class="font-sans text-gray-900 antialiased ">
    @include('includes.navbar-guest')

    <div class="bg-[url('../../public/images/bg1.png')] bg-cover bg-bottom bg-no-repeat h-screen">

        <div class="flex justify-center ">
            <img src="./images/name.png" alt="" class="h-14 hover:scale-105 transition-all duration-300">
        </div>


        <div >
            {{ $slot }}
        </div>

    </div>
</body>

</html>