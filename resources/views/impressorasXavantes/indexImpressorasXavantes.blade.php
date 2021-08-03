@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


<div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    @if(count($impressorasXavantess)>0)
    <br>
<table class="table table-striped table table-bordered">

    <h1>Impressoras Xavantes
        <hr>
        <a href="/cadastroImpressorasXavantes" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="impressorasXavantes/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showImpressorasXavantes" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
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
            @foreach ($impressorasXavantess as $impressorasXavantes)
            <tr>
                <td scropt="row">{{ $impressorasXavantes->modelo }}</td>
                <td scropt="row">{{ $impressorasXavantes->tonner }}</td>
                <td scropt="row">{{ $impressorasXavantes->setor }}</td>
                <td>
                <a href="/editImpressorasXavantes/{{ $impressorasXavantes->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteImpressorasXavantes/{{ $impressorasXavantes->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        @elseif (count($impressorasXavantess) == 0)
        <br>
        <h5><br>Não há Impressoras Xavantes cadastradas
            <hr>
            <a href="/cadastroImpressorasXavantes" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        @endif
</div>


@endsection
