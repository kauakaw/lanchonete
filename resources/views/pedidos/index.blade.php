@extends('layouts.app')
@section('title', 'Pedidos')
@section('content')
    @include('partials.alerts')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pedidos</h2>
        <a class="btn btn-primary" href="{{ route('pedidos.create') }}">Novo Pedido</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Atendente</th>
                        <th>Status</th>
                        <th class="text-end">Total</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody id="itensBody">
                @foreach($pedidos as $pedido)
                    @foreach($pedido->itens as $item)
                        <tr>
                            <td>{{ $item->produto->nome }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

                <div class="fw-bold">Total: <span id="pedidoTotal">R$ {{ number_format($pedido->total,2,',','.') }}
                </span>
            </div>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $pedidos->links() }}</div>
@endsection