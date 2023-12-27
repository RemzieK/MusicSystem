<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ... (unchanged content) ... -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <x-banner />
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    @stack('modals')
    @livewireScripts
</body>
</html>
