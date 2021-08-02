@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($impressoras)>0)
    <br>
<table class="table table-striped table table-bordered">
    <div class="dashboard-tinta-container">
        <a href="/indexCilindro" id="show" class="btn btn-dark"><ion-icon name="film-outline"></ion-icon> Cilindros</a></h5>
        <a href="/indexTinta" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-palette-outline"></ion-icon> Tintas</a></h5>
        <a href="/indexTonner"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="repeat-outline"></ion-icon> Tonners</a>
    </div>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
    <h1>Impressoras MG
        <hr>
        <a href="/cadastroImpressora" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="impressora/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showImpressora" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
    </h1>
    <br>
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Tonner</th>
                <th scope="col">Setor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impressoras as $impressora)
            <tr>
                <td scropt="row">{{ $impressora->modelo }}</td>
                <td scropt="row">{{ $impressora->tonner }}</td>
                <td scropt="row">{{ $impressora->setor }}</td>
                <td>
                <a href="/editImpressora/{{ $impressora->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteImpressora/{{ $impressora->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        @elseif (count($impressoras) == 0)
        <br>
        <h5><br>Não há Impressoras cadastradas
            <hr>
            <a href="/cadastroImpressora" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        @endif
</div>


@endsection
