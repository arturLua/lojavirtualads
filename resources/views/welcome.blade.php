<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Loja Virtual') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased">

        @include('layouts.navigation')

        <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

            <!-- título da seção -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white tracking-tight">Produtos</h1>
                <p class="text-slate-500 mt-1 text-sm">{{ $products->count() }} {{ $products->count() === 1 ? 'item disponível' : 'itens disponíveis' }}</p>
            </div>

            <!-- filtro por tipo — pills -->
            <div class="flex flex-wrap gap-2 mb-10">
                <a href="{{ url('/') }}"
                   class="pill-{{ is_null($selectedTypeId) ? 'active' : 'inactive' }} text-sm px-4 py-1.5 rounded-full font-medium transition-colors">
                    Todos
                </a>
                @foreach($types as $type)
                <a href="{{ url('/') }}?type_id={{ $type->id }}"
                   class="pill-{{ $selectedTypeId == $type->id ? 'active' : 'inactive' }} text-sm px-4 py-1.5 rounded-full font-medium transition-colors">
                    {{ $type->name }}
                </a>
                @endforeach
            </div>

            <!-- listagem de produtos -->
            @if($products->isEmpty())
            <div class="text-center py-24">
                <p class="text-slate-500 text-lg">Nenhum produto encontrado para este filtro.</p>
                <a href="{{ url('/') }}" class="mt-4 inline-block text-amber-400 text-sm hover:underline">Ver todos os produtos</a>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="card-product bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">

                    <!-- imagem -->
                    <div class="w-full h-52 bg-slate-700 flex items-center justify-center overflow-hidden">
                        @if($product->image)
                        <img src="{{ Storage::url($product->image) }}"
                             alt="{{ $product->name }}"
                             class="h-full object-contain">
                        @else
                        <span class="text-slate-500 text-sm tracking-wide uppercase">Sem imagem</span>
                        @endif
                    </div>

                    <!-- informações do produto -->
                    <div class="p-4">
                        @if($product->type)
                        <span class="text-xs text-slate-500 uppercase tracking-widest font-medium">{{ $product->type->name }}</span>
                        @endif
                        <h2 class="text-slate-100 font-semibold mt-1 mb-3 leading-snug">{{ $product->name }}</h2>
                        <p class="text-amber-400 font-bold text-lg">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </p>
                    </div>

                </div>
                @endforeach
            </div>
            @endif

        </main>

        <!-- rodapé -->
        <footer class="mt-24 border-t border-slate-800 py-8">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center text-slate-600 text-sm">
                © {{ date('Y') }} {{ config('app.name', 'Loja Virtual') }}. Todos os direitos reservados.
            </div>
        </footer>

    </body>
</html>