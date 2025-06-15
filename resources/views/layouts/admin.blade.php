<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PakCab Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg hidden md:block">
            <div class="p-6 font-bold text-xl border-b">PakCab Admin</div>
            <nav class="mt-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-6 py-2 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('cities.index') }}"
                    class="block px-6 py-2 hover:bg-gray-100 {{ request()->routeIs('cities.*') ? 'bg-gray-200 font-semibold' : '' }}">
                    Cities
                </a>
                <a href="{{ route('cars.index') }}"
                    class="block px-6 py-2 hover:bg-gray-100 {{ request()->routeIs('cars.*') ? 'bg-gray-200 font-semibold' : '' }}">
                    Cars
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>
