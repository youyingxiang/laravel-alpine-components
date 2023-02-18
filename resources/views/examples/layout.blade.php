<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>laravel-alpine-components</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link href="{{ asset(mix('app.css', 'vendor/laravel-alpine-components')) }}" rel="stylesheet" type="text/css">
</head>
    <body class="antialiased">
        <div class="min-h-full">
            <div class="py-10">
                <header>
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">{{ ucfirst(request()->route()->parameter('component') ?? "examples") }}</h1>
                    </div>
                </header>
                <main>
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="px-4 py-8 sm:px-0">
                            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200 flex items-center justify-center">
                                    @yield('content')
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="{{ asset(mix('app.js', 'vendor/laravel-alpine-components')) }}"></script>
    </body>
</html>