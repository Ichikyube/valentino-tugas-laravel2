<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @stack('styles')
        @livewireStyles
        @livewireScripts
        <script src="//unpkg.com/alpinejs" defer></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="antialiased font-redHatMono bg-yellow-50">
        @include('partials.navbar')
        <div class="container h-full mx-auto">
                @yield('body')
        </div>
        @stack('scripts')
    </body>
</html>
