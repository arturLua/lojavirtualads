<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('products/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $product->id }}">

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Editar Produto</h1>

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <x-input-label>Nome:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" required name="name" type="text" :value="$product->name" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Descrição:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="description" type="textarea" :value="$product->description" />
        <x-input-error :messages="$errors->get('description')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Quantidade:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="quantity" type="number" :value="$product->quantity" />
        <x-input-error :messages="$errors->get('quantity')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Preço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="price" type="number" :value="$product->price" />
        <x-input-error :messages="$errors->get('price')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Tipo do produto:</x-input-label>
        <select class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="type_id">
            <option value="">Selecione</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" @selected($product->type_id == $type->id)>
                {{ $type->name }}
            </option>
            @endforeach
        </select>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Imagem:</x-input-label>

        @if($product->image)
        <div class="mb-3">
            <img src="{{ Storage::url($product->image) }}" alt="Imagem atual" class="h-24 rounded border">
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Imagem atual. Selecione um novo arquivo para substituir.</p>
        </div>
        @endif

        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="image" type="file" accept="image/*" />
        <x-input-error :messages="$errors->get('image')"/>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>