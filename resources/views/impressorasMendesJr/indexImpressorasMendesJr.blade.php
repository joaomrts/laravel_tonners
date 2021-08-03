@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')

<div class="col-md-10 col-sm-10 offset-md-1  dashboard-events-container">
    @if(count($impressorasMendesJrs)>0)
    <br>
<table class="table table-striped table table-bordered">

    <h1>Impressoras Mendes Jr.
        <hr>
        <a href="/cadastroImpressorasMendesJr" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="impressorasMendesJr/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showImpressorasMendesJr" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
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
            @foreach ($impressorasMendesJrs as $impressorasMendesJr)
            <tr>
                <td scropt="row">{{ $impressorasMendesJr->modelo }}</td>
                <td scropt="row">{{ $impressorasMendesJr->tonner }}</td>
                <td scropt="row">{{ $impressorasMendesJr->setor }}</td>
                <td>
                <a href="/editImpressorasMendesJr/{{ $impressorasMendesJr->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteImpressorasMendesJr/{{ $impressorasMendesJr->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        @elseif (count($impressorasMendesJrs) == 0)
        <br>
        <h5><br>Não há Impressoras Mendes Jr. cadastradas
            <hr>
            <a href="/cadastroImpressorasMendesJr" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        @endif
</div>
@endsection
