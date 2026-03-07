<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- menu button sm screen-->

        <x-menu-button />
        <!-- sidebar -->
        <x-sidebar/>

        <!-- Main Content Area -->
        <div id="content" class="flex-1 px-7 py-7  max-sm:px-6 transition-all duration-300 overflow-auto">
           {{ $slot }}
        </div>

    </div>

</body>
</html>

