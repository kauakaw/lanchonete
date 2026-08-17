@extends('layouts.app')
@section('title', 'Produto')
@section('content')
@include('partials.alerts')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <h2 class="mb-0">Produtos</h2>

    <form method="GET" action="{{ route('produtos.index') }}" class="d-flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar por nome...">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        <a class="btn btn-outline-secondary" href="{{ route('produtos.index') }}">Limpar</a>
    </form>

    <a class="btn btn-primary" href="{{ route('produtos.create') }}">Novo produto</a>
</div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Ativa</th>
                        <th>Atualizado em</th>
                        <th>Imagens</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>
                                @if ($produto->ativa)
                                    <span class="badge text-bg-success">Sim</span>
                                @else
                                    <span class="badge text-bg-secondary">Não</span>
                                @endif
                            </td>
                            <td>{{ $produto->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($produto->image)
                                    <img src="{{ asset('storage/' . $produto->image) }}"
                                        width="150"
                                        class="img-thumbnail">
                                @else
                                    Sem imagem
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-outline-secondary">
                                    Editar
                                </a>

                                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center p-4 text-muted">Nenhum produto cadastrado.</td></tr>
                    @endforelse

                    <div class="mt-3">
                    {{ $produtos->links() }}
                </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection