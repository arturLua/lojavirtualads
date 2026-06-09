<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-slate-800 border border-slate-700 p-6 rounded-lg shadow mt-8" action="{{ url('products/new') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-slate-100">Cadastrar Produto</h1>

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-900 text-red-300 rounded border border-red-700">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <x-input-label class="block mb-1 text-slate-300">Nome:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" required name="name" type="text" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-slate-300">Descrição:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="description" type="textarea" />
        <x-input-error :messages="$errors->get('description')"/>

        <x-input-label class="block mb-1 text-slate-300">Quantidade:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="quantity" type="number" />
        <x-input-error :messages="$errors->get('quantity')"/>

        <x-input-label class="block mb-1 text-slate-300">Preço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="price" type="number" />
        <x-input-error :messages="$errors->get('price')"/>

        <x-input-label class="block mb-1 text-slate-300">Tipo do produto:</x-input-label>
        <select class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="type_id">
            <option value="">Selecione</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <x-input-label class="block mb-1 text-slate-300">Imagem:</x-input-label>
        <input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-300" name="image" type="file" accept="image/*" />
        <x-input-error :messages="$errors->get('image')"/>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>
