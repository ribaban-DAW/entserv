<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('headTitle')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="flex flex-col min-h-screen">
    <header class="flex justify-between items-center text-slate-200 bg-sky-600 px-8 py-4">
        <a href={{ route('animals.index') }}>CRUD Animales</p>
        <a class="p-4 py-2 bg-slate-800 rounded-[10px] hover:bg-slate-900" href={{ route('animals.create') }}>Crear animal</a>
    </header>
    <main class="flex-1 py-8 px-4">
        <h1 class="text-3xl mb-4 font-bold">@yield('mainTitle')</h1>
        @if (session('success'))
            <p class="text-xl text-green-700 mb-4">{{ session('success') }}</p>
        @endif
        @yield('main')
    </main>
    <footer class="bg-sky-600 py-16 text-slate-200 text-center">
        <p>Design by Rojohn</p>
    </footer>
</div>
</body>
</html>
