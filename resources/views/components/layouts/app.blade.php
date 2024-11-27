<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Application' }}</title>
    {{-- @vite('resources/css/app.css') --}}
    @livewireStyles
</head>
<body>
    <header>
        <h1>My Application</h1>
    </header>
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
