<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mahkota Catering' }}</title>
    {{-- @vite('resources/css/app.css') --}}
    @livewireStyles
</head>
<body>
    <header>

    </header>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
