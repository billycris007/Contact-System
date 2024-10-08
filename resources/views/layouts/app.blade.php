<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

         <!-- Include Styles -->
        @include('layouts/sections/styles')

    </head>
    <body class="antialiased">
         @include('layouts/sections/header')
        <div class="center relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @yield('layoutContent')
        </div>

        <!-- Include Scripts -->
        @include('layouts/sections/footer')
        @include('layouts/sections/scripts')
    </body>
</html>
