<x-app-layout>

    <div class="w-full max-w-4xl bg-white dark:bg-gray-800 p-6 rounded-lg shadow mx-auto">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Fornecedores</h1>
            <a href="{{ url('suppliers/new') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cadastrar</a>

        </div>

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Nome</th>
                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">E-mail</th>
                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Telefone</th>
                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Endereço</th>
                    <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr class="border-b border-gray-300 dark:border-gray-600">
                    <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->name }}</td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->email ?? '—' }}</td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->phone ?? '—' }}</td>
                    <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $supplier->address ?? '—' }}</td>
                    <td class="px-4 py-2">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ url('/suppliers/update', ['id' => $supplier->id]) }}" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">Editar</a>
                            <a href="{{ url('/suppliers/delete', ['id' => $supplier->id]) }}" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Excluir</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
