<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MS2') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if(session('error'))
                    <div class="flex justify-center">
                        <div class="max-w-md w-full mt-8"> <!-- Adjusted margin -->
                            <div id="alert" class="bg-danger-100 border border-danger-200 text-danger-700 px-4 py-3 rounded relative"> <!-- Adjusted padding -->
                                <span class="block sm:inline">{{ session('error') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <button type="button" onclick="document.getElementById('alert').style.display = 'none';">
                                    <svg class="fill-current h-6 w-6 text-error-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="flex justify-center">
                        <div class="max-w-md w-full mt-6">
                            <div id="alert" class="bg-success-100 border border-success-200 text-success-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <button type="button" onclick="document.getElementById('alert').style.display = 'none';">
                                    <svg class="fill-current h-6 w-6 text-success-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                @endif
                {{ $slot }}
                <br>
            </main>
        </div>
    </body>
</html>
