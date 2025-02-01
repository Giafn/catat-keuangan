<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Aplikasi Tabungan') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
                <footer class="mb-16">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-center">
                            <div class="text-sm text-gray-500">
                                Made with ❤️ by <a href="https://giafn.my.id" class="text-blue-500">Gia Fn</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </main>
            {{-- footer --}}
            <div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200">
                <div class="grid h-full max-w-lg grid-cols-3 mx-auto font-medium">
                    <a href="/" class="text-blue-600 inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 group-hover:text-blue-600 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        <span class="text-sm text-gray-500 group-hover:text-blue-600">Home</span>
                    </a>
                    <a href="/tabungans" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z"/>
                            <path d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z"/>
                        </svg>
                        <span class="text-sm text-gray-500 group-hover:text-blue-600">Tabungan</span>
                    </a>
                    
                    <a href="/profile" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 group">
                        <svg class="w-5 h-5 mb-2 text-gray-500 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                        <span class="text-sm text-gray-500 group-hover:text-blue-600">Profile</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
