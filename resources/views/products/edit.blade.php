<x-app-layout>

    <form action="{{ url('products/update') }}" method="POST">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <label>Nome:</label><br>
        <input name="name" type="text" value="{{ $product['name'] }}" /><br>
        <label>Descrição:</label><br>
        <input name="description" type="textarea" value="{{
$product['description'] }}" /><br>
        <label>Quantidade:</label><br>
        <input name="quantity" type="number" value="{{ $product['quantity']
}}" /><br>
        <label>Preço:</label><br>
        <input name="price" type="number" value="{{ $product['price'] }}" /><br>
        <label>Tipo do produto:</label><br>
        <select name="type_id">
            <option value="">Selecione</option>

            @foreach($types as $type)
            <option value="{{ $type->id }}" @selected($product->type_id
                == $type->id)>
                {{ $type->name }}
            </option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Salvar" />
    </form>
</x-app-layout>