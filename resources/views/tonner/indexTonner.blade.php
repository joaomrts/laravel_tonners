@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')
    @if(count($tonners)>0)
    <br>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <div class="dashboard-tinta-container">
            <a href="/indexCilindro" id="show" style="margin-left: 5px" class="btn btn-dark"><ion-icon name="film-outline"></ion-icon> Cilindros</a></h5>
            <a href="/indexTinta"  style="margin-left: 5px" class="btn btn-dark"><ion-icon name="color-palette-outline"></ion-icon> Tintas</a>
            <a href="/indexImpressora" id="show" style="margin-left: 320px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
        </div>
        <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
    <h1>Tonners
        <hr>
        <div id="search-container-tonner" class="col-sm-6 col-md-6">
            <form action="/indexTonner" method="POST">
                @csrf
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            </form>
        </div>
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
        @if (isset($filters))
        {{ $tonners->appends($filters)->links() }}
    @else
    @endif
        @elseif (count($tonners) == 0)
        <h5><br>Não há tonners cadastrados
            <hr>
            <a href="/cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Tonner</a></h5>
        @endif
</div>
@endsection
