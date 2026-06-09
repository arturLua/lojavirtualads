<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //página pública inicial com listagem de produtos
    public function index(Request $request)
    {
        //busca todos os tipos para o filtro
        $types = Type::all();

        //filtra por tipo se o parâmetro for enviado
        $query = Product::with('type');

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->get();

        return view('welcome', [
            'products'       => $products,
            'types'          => $types,
            'selectedTypeId' => $request->type_id,
        ]);
    }
}
