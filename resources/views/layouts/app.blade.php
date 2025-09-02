<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Prueba Técnica')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Evita el flash de modales antes de que Alpine/Livewire inicien -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-gray-800">

    {{-- contenedor principal de la aplicación --}}
    <div class="min-h-screen">
        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>