<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'FinTrack') }}</title>

    {{-- Google Font --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-gray-100 font-[Poppins] overflow-hidden">

<div class="flex h-screen">

    {{-- Sidebar --}}
    @include('partials.app-sidebar')

    {{-- Content --}}
    <div class="flex-1 min-w-0 flex flex-col">

        @if(request()->routeIs('dashboard'))
            @include('partials.app-navbar')
        @endif

        <main class="flex-1 overflow-y-auto overflow-x-hidden p-8">

            @yield('content')

        </main>

    </div>

</div>

@stack('scripts')

</body>

</html>