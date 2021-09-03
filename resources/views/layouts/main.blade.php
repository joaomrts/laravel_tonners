<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans');
        </style>

        <!-- CSS Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="{{ asset("jquery.mask.js") }}"></script>

        <!-- CSS da aplicação -->


        <script src="/js/scripts.js"></script>

        <link rel="icon" type="favicon" href="/img/logo.png" />

    </head>
    <body>
        <header>
            <nav class="navnavbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="logo">
                    </a>
                    <h1>Controle de T.I.</h1>
                    <ul class="navbar-nav">
                        @auth
                        <div class="btn-group" style="margin-right: 20px">
                            <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <ion-icon name="person-circle-outline" style="margin-right: 5px"></ion-icon>Olá {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" style="margin-right: 15px">
                                <li class="nav-form">
                                    <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout"
                                    style="text-align: center"
                                    class="nav-link"
                                    id="form-logout"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Sair do Sistema
                                    </a>
                                    </form>
                                 </li>
                            </div>
                          </div>
                        @endauth
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
            <p>Souza e Cambos Confecções &copy; 2021</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        @yield('js')
    </body>
</html>
