<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('headTitle')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<header>
    <nav>
        <ul class="flex gap-3 py-4 text-slate-200 bg-sky-600">
            <li><a class="p-4 hover:bg-sky-700" href="/">Inicio</a></li>
            <li><a class="p-4 hover:bg-sky-700" href="/cliente">Cliente</a></li>
        </ul>
    </nav>
</header>
<main class="py-8 px-4">
    <h1 class="text-3xl mb-4 font-bold">@yield('mainTitle')</h1>
    @yield('main')
</main>
<footer class="bg-sky-600 py-16 text-slate-200 text-center">
    <p>Design by Rojohn</p>
</footer>
</body>
</html>
@yield('html')
