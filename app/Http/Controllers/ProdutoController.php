<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    
    public function index()
    {
        $q = request('q');
    $categoriaId = request('categoria_id');

    $produtos = Produto::query()
        ->with('categoria')
        ->when($q, function ($query) use ($q) {
            $query->where('nome', 'like', "%{$q}%");
        })
        ->when($categoriaId, function ($query) use ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        })
        ->orderBy('nome')
        ->paginate(10)
        ->withQueryString();

    $categorias = Categoria::orderBy('nome')->get();

    return view('produtos.index', compact('produtos', 'categorias'));
    }

    
    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:100|unique:produtos,nome',
            'descricao' => 'nullable|string|max:500',
            'preco' => 'required|numeric',
            'ativa' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $dados['ativa'] = $request->boolean('ativa');

        if ($request->hasFile('image')) {

            $path = $request->file('image')
                ->store('produtos', 'public');

            $dados['image'] = $path;
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $dados = $request->validated();
        $dados['ativa'] = $request->boolean('ativa');

        $produto->update($dados);

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto excluído com sucesso!');
    }
}
