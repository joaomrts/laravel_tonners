@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($cilindros)>0)
    <br>
<table class="table table-striped table table-bordered">
    <div class="dashboard-tinta-container">
        <a href="/indexTinta" style="margin-left: 5px" class="btn btn-dark"><ion-icon name="color-palette-outline"></ion-icon> Tintas</a>
        <a href="/indexTonner" style="margin-left: 5px" id="show" class="btn btn-dark"><ion-icon name="repeat-outline"></ion-icon> Tonners</a>
        <a href="/indexImpressora" id="show" style="margin-left: 320px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a>
    </div>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
    <h1>Cilindros
            <hr>
            <div id="search-container-tonner" class="col-sm-6 col-md-6">
                <form action="/indexCilindro" method="POST">
                    @csrf
                    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                </form>
            </div>
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
    @if (isset($filters))
        {{ $cilindros->appends($filters)->links() }}
    @else
    @endif
        @elseif (count($cilindros) == 0)
        <br>
        <h5><br>Não há cilindros cadastrados
            <hr>
            <a href="/cadastroCilindro" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Cilindro</a></h5>
            <div class="dashboard-tinta-container">
                <a href="/indexCilindro" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="speedometer-outline"></ion-icon> Equipamentos</a></h5>
                <a href="/indexTinta" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-palette-outline"></ion-icon> Tintas</a></h5>
                <a href="/indexTonner"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="repeat-outline"></ion-icon> Tonners</a>
                <a href="/indexImpressora" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
            </div>
            @endif
</div>
@endsection
