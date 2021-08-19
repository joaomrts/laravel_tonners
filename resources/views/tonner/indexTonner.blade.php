@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')
    @if(count($tonners)>0)

    <div id="search-suprimentos-container" class="col-sm-12 col-md-12">
        <h1>SUPRIMENTOS</h1>
        <form action="/Suprimentos" method="POST">
            @csrf
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <br>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <table class="table table-striped table table-bordered">
            <div class="dashboard-tinta-container">
                <br>
                <a href="/Office" class="btn btn-dark"><ion-icon name="logo-windows"></ion-icon> Office</a>
                <a href="/Impressoras" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a>
            </div>
            <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
    <h1>Tonners
        <hr>
        <a href="/cadastro" type="button" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tonner</a>
    <div class="dashboard-tinta-container">
        <a href="tonner/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
        <a href="/showTonner" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
    </div>
    <br>
    </h1>
        <thead>
            <tr>
                <th scope="col" class="">Modelo</th>
                <th scope="col">Impressoras Compatíveis</th>
                <th scope="col">Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tonners as $tonner)
            <tr>
                <td scropt="row">{{ $tonner->modelo }}</td>
                <td scropt="row">{{ $tonner->qtde_impressora }}</td>
                <td scropt="row">{{ $tonner->estoque }}</td>
                <td>
                <a href="/edit/{{ $tonner->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/{{ $tonner->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    @elseif (count($tonners) == 0 && $filters)
    <div class="col-sm-10 colmd 10 offset-md-1">
        <h5><br>Não foi possível retornar resultados com sua busca para Tonners
        <hr>
        <a href="/indexTonner" class="btn btn-success">Ver todos os tonners</a>
        <a href="/cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tonner</a></h5>
    </div>
    @elseif (count($tonners)== 0)
    <div class="col-sm-10 colmd 10 offset-md-1">
    <br>
        <h5><br>Não há tonners cadastrados
    <hr>
        <a href="/cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tonner</a></h5>
    </div>
    @endif
</div>


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($tintas)>0)
    <br>
<table class="table table-striped table table-bordered">
    <h1>Tintas
        <hr>
        <a href="/cadastroTinta" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tinta</a></h5>
        <div class="dashboard-tinta-container">
            <a href="tinta/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showTinta" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
    </h1>
    <br>
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Impressoras Compatíveis</th>
                <th scope="col">Estoque</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tintas as $tinta)
            <tr>
                <td scropt="row">{{ $tinta->modelo }}</td>
                <td scropt="row">{{ $tinta->qtde_impressora }}</td>
                <td scropt="row">{{ $tinta->estoque }}</td>
                <td>
                <a href="/editTinta/{{ $tinta->id }}"style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteTinta/{{ $tinta->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif (count($tintas) == 0 && $filters)
    <h5><br>Não foi possível retornar resultados com sua busca para Tintas
    <hr>
    <a href="/indexTonner" style="margin-right: 5px" class="btn btn-success">Ver todos as Tintas</a>
    <a href="/cadastroTinta" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tintas</a></h5>
@elseif (count($tintas)== 0)
<br>
    <h5><br>Não há tintas cadastrados
<hr>
<a href="/cadastroTinta" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tinta</a></h5>
@endif
<br>
</div>


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($cilindros)>0)
    <br>
<table class="table table-striped table table-bordered">
    <h1>Cilindros
            <hr>
        <a href="/cadastroCilindro" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Cilindro</a>
        <div class="dashboard-tinta-container">
            <a href="cilindro/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showCilindro" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a>
        </div>
        <br>
    </h1>
    <br>
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Impressoras Compatíveis</th>
                <th scope="col">Estoque</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cilindros as $cilindro)
            <tr>
                <td scropt="row">{{ $cilindro->modelo }}</td>
                <td scropt="row">{{ $cilindro->qtde_impressora }}</td>
                <td scropt="row">{{ $cilindro->estoque }}</td>
                <td>
                <a href="/editCilindro/{{ $cilindro->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteCilindro/{{ $cilindro->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif (count($cilindros) == 0 && $filters)
            <h5><br>Não foi possível retornar resultados com sua busca para Cilindros
            <hr>
            <a href="/indexTonner" style="margin-right: 5px" class="btn btn-success">Ver todos os cilindros</a>
            <a href="/cadastroCilindro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Cilindro</a></h5>
    @elseif (count($cilindros)== 0)
    <br>
        <h5><br>Não há cilindros cadastrados
            <hr>
        <a href="/cadastroCilindro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Cilindro</a></h5>
    @endif
</div>

@endsection
