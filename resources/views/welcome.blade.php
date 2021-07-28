@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($tonners)>0)
    <br>
    <table class="table table-striped table-bordered">
    <h1>Tonners
        <hr>
        <a href="/cadastro" type="button" class="btn btn-success">Cadastrar Tonner</a>
    <div class="dashboard-tinta-container">
    <a href="tonner/create-pdf" type="button" class="btn btn-dark">Download PDF</a>
    </div>
    <br>
    </h1>
        <thead>
            <tr>
                <th scope="col" class="">Modelo</th>
                <th scope="col">Impressoras Compatíveis</th>
                <th scope="col">Estoque</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tonners as $tonner)
            <tr>
                <td scropt="row">{{ $tonner->modelo }}</td>
                <td scropt="row">{{ $tonner->qtde_impressora }}</td>
                <td scropt="row">{{ $tonner->estoque }}</td>
                <td>
                <a href="/edit/{{ $tonner->id }}" style="margin-right: 15px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                <form action="/{{ $tonner->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        @elseif (count($tonners) == 0)
        <h5><br>Não há tonners cadastrados
            <hr>
            <a href="/cadastro" class="btn btn-success">Cadastrar Tonner</a></h5>
        @endif
</div>
<br>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($tintas)>0)
    <br>
<table class="table table-striped table table-bordered">
    <h1>Tintas
        <hr>
        <a href="/cadastroTinta" id="cadastro" class="btn btn-success">Cadastrar Tinta</a></h5>
        <div class="dashboard-tinta-container">
        <a href="tinta/create-pdf" type="button" class="btn btn-dark">Download PDF</a>
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
                <a href="/editTinta/{{ $tinta->id }}" style="margin-right: 15px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                <form action="/deleteTinta/{{ $tinta->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        @elseif (count($tintas) == 0)
        <h5><br>Não há tintas cadastradas
            <hr>
            <a href="/cadastroTinta" id="cadastro" class="btn btn-success">Cadastrar Tinta</a></h5>
        @endif
</div>


<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($cilindros)>0)
    <br>
<table class="table table-striped table table-bordered">
    <h1>Cilindros
        <hr>
        <a href="/cadastroCilindro" id="cadastro" class="btn btn-success">Cadastrar Cilindro</a></h5>
        <div class="dashboard-tinta-container">
        <a href="cilindro/create-pdf" type="button" class="btn btn-dark">Download PDF</a>
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
                <a href="/editCilindro/{{ $cilindro->id }}" style="margin-right: 15px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                <form action="/deleteCilindro/{{ $cilindro->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        @elseif (count($cilindros) == 0)
        <h5><br>Não há cilindros cadastrados
            <hr>
            <a href="/cadastroCilindro" id="cadastro" class="btn btn-success">Cadastrar Cilindro</a></h5>
        @endif
</div>
@endsection
