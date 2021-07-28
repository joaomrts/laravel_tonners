<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="utf-8">

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans');
        </style>

        <!-- CSS Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- CSS da aplicação -->

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar-expand">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="Logo">
                    </a>
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">
                            <a href="/cadastro" class="nav-link">Cadastrar Tonner</a>
                        </li>
                        <li class="nav-item">
                            <a href="/cadastroTinta" class="nav-link">Cadastrar Tinta</a>
                        </li>
                        <li class="nav-item">
                            <a href="/cadastroCilindro" class="nav-link">Cadastrar Cilindro</a>
                        </li>
                         <li class="nav-form">
                            <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                            class="nav-link"
                            id="form-logout"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair
                            </a>
                            </form>
                         </li>
                        @endauth
                       @guest
                       <li class="nav-item">
                            <a href="/cadastro" class="nav-link">Cadastrar Tonner</a>
                       </li>
                       <li class="nav-item">
                        <a href="/cadastroTinta" class="nav-link">Cadastrar Tinta</a>
                       </li>
                       <li class="nav-item">
                        <a href="/cadastroCilindro" class="nav-link">Cadastrar Cilindro</a>
                    </li>
                       @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                    <p class="msg">{{ session('msg') }}</p></p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Souza e Cambos Confecções Ltda. &copy; 2021</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
