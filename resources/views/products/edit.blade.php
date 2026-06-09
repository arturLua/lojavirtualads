<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-slate-800 border border-slate-700 p-6 rounded-lg shadow mt-8" action="{{ url('products/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $product->id }}">

        <h1 class="text-2xl font-bold mb-6 text-slate-100">Editar Produto</h1>

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-900 text-red-300 rounded border border-red-700">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <x-input-label class="block mb-1 text-slate-300">Nome:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" required name="name" type="text" :value="$product->name" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-slate-300">Descrição:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="description" type="textarea" :value="$product->description" />
        <x-input-error :messages="$errors->get('description')"/>

        <x-input-label class="block mb-1 text-slate-300">Quantidade:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="quantity" type="number" :value="$product->quantity" />
        <x-input-error :messages="$errors->get('quantity')"/>

        <x-input-label class="block mb-1 text-slate-300">Preço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="price" type="number" :value="$product->price" />
        <x-input-error :messages="$errors->get('price')"/>

        <x-input-label class="block mb-1 text-slate-300">Tipo do produto:</x-input-label>
        <select class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="type_id">
            <option value="">Selecione</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" @selected($product->type_id == $type->id)>
                {{ $type->name }}
            </option>
            @endforeach
        </select>

        <x-input-label class="block mb-1 text-slate-300">Imagem:</x-input-label>

        @if($product->image)
        <div class="mb-3">
            <img src="{{ Storage::url($product->image) }}" alt="Imagem atual" class="h-24 rounded border border-slate-600">
            <p class="text-sm text-slate-500 mt-1">Imagem atual. Selecione um novo arquivo para substituir.</p>
        </div>
        @endif

        <input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-300" name="image" type="file" accept="image/*" />
        <x-input-error :messages="$errors->get('image')"/>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>
