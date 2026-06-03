<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //
    public function create()
    {
        return view('suppliers.create');
    }

    //função chamada no submit do form
    //será um POST com os dados
    public function store(Request $request)
    {
        //alimenta a var $errors na view
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);

        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        //flash session messages (notificações)
        return redirect('/suppliers')->with('success', 'Fornecedor cadastrado!');
    }

    //função que mostra a view de listagem
    //passa como parâmetro a consulta no banco com ::all()
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    public function edit($id)
    {
        //faz select * from suppliers where id= ?
        $supplier = Supplier::find($id);

        //retorna a view passando a TUPLA de fornecedor consultado
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'    => 'required|min:2|max:100',
            'email'   => 'nullable|email|max:100',
            'phone'   => 'nullable|max:20',
            'address' => 'nullable|max:255',
        ]);

        $supplier = Supplier::find($request->id);

        //método update faz um update suppliers set name = ? etc...
        $supplier->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/suppliers')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //select * from suppliers where id = ?
        $supplier = Supplier::find($id);

        //deleta o fornecedor no banco
        $supplier->delete();

        return redirect('/suppliers')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
