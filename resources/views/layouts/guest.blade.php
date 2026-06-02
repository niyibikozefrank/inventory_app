<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Prevent caching -->
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <script>
            // Prevent back button navigation after logout
            window.addEventListener('load', function() {
                // Push a state to history
                window.history.pushState(null, null, window.location.href);
                
                // Handle back button click
                window.addEventListener('popstate', function() {
                    window.history.pushState(null, null, window.location.href);
                });
            });

            // Disable forward button by preventing navigation
            document.addEventListener('keydown', function(e) {
                // Alt + Right arrow (forward) or Alt + Left arrow (back)
                if ((e.altKey && e.key === 'ArrowRight') || (e.altKey && e.key === 'ArrowLeft')) {
                    e.preventDefault();
                }
            });
        </script>
    </body>
</html>
