<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">

        <title>@yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Fonte do Google -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans');
        </style>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


        <!-- CSS Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="{{ asset("jquery.mask.js") }}"></script>
        <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>

        {{-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> --}}
	    {{-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> --}}

        <!-- CSS da aplicação -->

        <link rel="stylesheet" href="/css/styles.css">
       
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>

        <link rel="icon" type="favicon" href="/img/logo.png" />

    </head>
    <body>
        <header class="d-print-none">
            <nav class="navnavbar-expand-lg">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="logo">
                    </a>
                    <h1 style="margin-left: 110px">Controle T.I.</h1>
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
                    <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="d-print-none">
            <p style="text-align: center">Souza e Cambos Confecções &copy; 2022</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
