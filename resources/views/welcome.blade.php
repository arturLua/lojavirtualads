<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Loja Virtual') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <!-- cabeçalho -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <span class="text-xl font-bold text-gray-900 dark:text-white">
                {{ config('app.name', 'Loja Virtual') }}
            </span>
            <div class="flex space-x-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    Entrar
                </a>
                <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                    Registrar
                </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Produtos</h1>

        <!-- filtro por tipo -->
        <form method="GET" action="{{ url('/') }}" class="mb-8">
            <div class="flex items-center space-x-3">
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Filtrar por tipo:</label>
                <select name="type_id" onchange="this.form.submit()" class="rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm p-2">
                    <option value="">Todos</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" @selected($selectedTypeId==$type->id)>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- listagem de produtos -->
        @if($products->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">Nenhum produto encontrado.</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">

                <!-- imagem do produto -->
                @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-400 dark:text-gray-500 text-sm">Sem imagem</span>
                </div>
                @endif

                <!-- informações do produto -->
                <div class="p-4">
                    <h2 class="text-base font-semibold text-gray-900 dark:text-white mb-1">{{ $product->name }}</h2>
                    <p class="text-blue-600 dark:text-blue-400 font-bold">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>

            </div>
            @endforeach
        </div>
        @endif

    </main>

</body>

</html>