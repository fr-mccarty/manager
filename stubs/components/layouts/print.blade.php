@props([
    'orientation' => 'portrait',
    'title' => env('APP_NAME'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>
<body class="font-sans antialiased">

<div class="bg-white">
    <!-- Page Content -->
    <main>
        <div class="px-6 py-3">

            <div>
                {{$slot}}
            </div>

        </div>
    </main>
</div>


@livewireScripts
</body>
</html>
