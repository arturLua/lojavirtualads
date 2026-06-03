<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('suppliers/new') }}" method="POST">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Cadastrar Fornecedor</h1>

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <x-input-label>Nome:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" required name="name" type="text" />
        <x-input-error :messages="$errors->get('name')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">E-mail:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="email" type="email" />
        <x-input-error :messages="$errors->get('email')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Telefone:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="phone" type="text" />
        <x-input-error :messages="$errors->get('phone')"/>

        <x-input-label class="block mb-1 text-gray-700 dark:text-gray-300">Endereço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="address" type="text" />
        <x-input-error :messages="$errors->get('address')"/>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>
