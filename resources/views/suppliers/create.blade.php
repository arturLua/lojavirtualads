<x-app-layout>

    <form class="w-full mx-auto max-w-md bg-slate-800 border border-slate-700 p-6 rounded-lg shadow mt-8" action="{{ url('suppliers/new') }}" method="POST">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-slate-100">Cadastrar Fornecedor</h1>

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

        <x-input-label class="block mb-1 text-slate-300">E-mail:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="email" type="email" />
        <x-input-error :messages="$errors->get('email')"/>

        <x-input-label class="block mb-1 text-slate-300">Telefone:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="phone" type="text" />
        <x-input-error :messages="$errors->get('phone')"/>

        <x-input-label class="block mb-1 text-slate-300">Endereço:</x-input-label>
        <x-text-input class="w-full p-2 mb-4 rounded border border-slate-600 bg-slate-700 text-slate-100" name="address" type="text" />
        <x-input-error :messages="$errors->get('address')"/>

        <x-primary-button> Salvar </x-primary-button>
    </form>
</x-app-layout>
