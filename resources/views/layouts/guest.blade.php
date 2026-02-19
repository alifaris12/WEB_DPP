<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Background gradient -->
    <div class="min-h-screen flex items-center justify-center"
         style="background: linear-gradient(180deg, rgba(255, 212, 0, 0.57) 0%, #FFFCF0 99.97%, rgba(255, 255, 255, 0.58) 99.98%);
                background-repeat:no-repeat; background-size:cover; background-attachment:fixed;">
        {{ $slot }}
    </div>
</body>
</html>
