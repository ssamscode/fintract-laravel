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

<div class="flex h-screen" x-data="{ sidebarOpen: false }">

    {{-- Sidebar --}}
    @include('partials.app-sidebar')

    {{-- Overlay --}}
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-black/50 lg:hidden"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;"></div>

    {{-- Content --}}
    <div class="flex-1 min-w-0 flex flex-col lg:pl-72">

        @if(request()->routeIs('dashboard'))
            @include('partials.app-navbar')
        @else
            <div class="lg:hidden">
                @include('partials.app-navbar')
            </div>
        @endif

        <main class="flex-1 overflow-y-auto overflow-x-hidden p-4 md:p-6 lg:p-8">

            @yield('content')

        </main>

    </div>

</div>

@stack('scripts')

</body>

</html>