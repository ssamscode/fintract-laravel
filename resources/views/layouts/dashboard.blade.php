<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>FinTrack</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#F8FAF9]">

<div class="min-h-screen flex">

    {{-- Sidebar --}}
    @include('partials.app-sidebar')

    <div class="flex-1 flex flex-col">

        {{-- Navbar --}}
        @include('partials.app-navbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>