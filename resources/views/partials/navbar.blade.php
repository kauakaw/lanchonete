

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarConteudo"
                aria-controls="navbarConteudo"
                aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarConteudo">
                <ul class="navbar-nav ms-auto">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.form') }}">Entrar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.form') }}">Criar conta</a>
                        </li>
                    @endguest

                    @auth

                        <li class="nav-item">
                            <a class="nav-link" href="#cardapio">Cardápio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#pedidos">Pedidos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contato">Contato</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="sobre">Sobre</a>
                        </li>

                        @if(auth()->user()->role === 'gerente')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">
                                    Sair
                                </button>
                            </form>
                        </li>
                    @endauth

                </ul>
            </div>

        </div>
</nav>