<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg
shadow" action="{{ url('products/new') }}" method="POST">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Cadastrar Produto</h1>

        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <x-input-label>Nome:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" required name="name" type="text" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Descrição:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="description" type="textarea" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Quantidade:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="quantity" type="number" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Preço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="price" type="number" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Tipo do produto:</x-input-label>

        <select class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="type_id">
            <option value="">Selecione</option>

            @foreach($types as $type)
            <option value="{{ $type->id }}">
                {{ $type->name }}
            </option>
            @endforeach

        </select>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>