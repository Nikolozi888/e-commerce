<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>

	@include('components.header')

	<div class="flex h-full bg-blue-700 text-white">
       @include('components.sidebar')
        <!-- Main Content -->
        {{ $slot }}

    </div>

    @if (session()->has('success'))
        <div x-data="{ show: false }"
            x-init="setTimeou(() => show = false, 4000)"
            x-show="show"
        
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-lg">
            <p>{{ session('success') }}</p>
        </div>
    @endif

</body>
</html>