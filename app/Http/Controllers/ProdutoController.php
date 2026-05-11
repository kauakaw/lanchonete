<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    
    public function index()
    {
        $produtos = Produto::orderBy('nome')->get(); // Paginação entra no Cap. 4
        return view('produtos.index', compact('produtos'));
    }

    
    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:100|unique:produtos,nome',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric',
            'ativa' => 'nullable|boolean',
        ]);

        $dados['ativa'] = $request->boolean('ativa');

        Produto::create($dados);

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
