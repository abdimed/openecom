<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CCBO</title>


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased font-poppins flex flex-col justify-between min-h-screen">

    <header class="bg-white border-b-2">

        <x-info-bar/>

        @include('sections.navbar')

    </header>

    <main class="relative">

        @yield('main')

    </main>

    <footer class="flex bg-primary h-[300px]">

        @include('sections.footer')

    </footer>


    @livewireScripts
</body>

</html>
