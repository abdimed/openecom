<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewireStyles
</head>

<body class="antialiased font-poppins flex flex-col justify-between min-h-screen">

    <header class="bg-primary">
        @include('sections.navbar')
    </header>

    <main class="">

        @yield('main')

    </main>

    @include('sections.footer')

    @livewireScripts
</body>

</html>
