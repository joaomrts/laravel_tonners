@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($tintas)>0)
    <br>
<table class="table table-striped table table-bordered">
    <div class="dashboard-tinta-container">
        <a href="/indexCilindro" id="show" class="btn btn-dark"><ion-icon name="film-outline"></ion-icon> Cilindros</a></h5>
        <a href="/indexTonner"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="repeat-outline"></ion-icon> Tonners</a>
        <a href="/indexImpressora" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
    </div>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
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
        @elseif (count($tintas) == 0)
        <h5><br>Não há tintas cadastradas
            <hr>
            <a href="/cadastroTinta" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tinta</a></h5>
        @endif
</div>

@endsection
