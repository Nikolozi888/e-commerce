<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

	@include('components.header')

	{{ $slot }}


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