@extends('layouts.app')
@section('title', 'Produto')
@section('content')
    @include('partials.alerts')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Produtos</h2>
        <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-primary">Novo Produto</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Ativa</th>
                        <th>Atualizado em</th>
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
                            <td class="text-end">
                                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-outline-secondary">
                                    Editar
                                </a>

                                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center p-4 text-muted">Nenhuma categoria cadastrada.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection