<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarConteudo">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarConteudo">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#cardapio">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pedidos">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sobre') }}">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>