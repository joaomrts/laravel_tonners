@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')



    @if(count($offices)>0)
    <div id="search-container-office" class="col-sm-12 col-md-12">
        <h1>SUÍTES DE ESCRITÓRIO</h1>
        <form action="/searchOffice" method="POST">
            @csrf
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
        <div class="dashboard-tinta-container">
            <a href="/Suprimentos"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-filter-outline"></ion-icon> Suprimentos</a>
            <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
        </div>
        <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
        <h1> Office
            <hr>
            <a href="/cadastroOffice" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Office</a></h5>
            <div class="dashboard-tinta-container">
                <a href="office/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
                <a href="/showOffice" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
            </div>
            <br>
        </h1>
    <br>
        <thead>
            <tr>
                <th scope="col">Usuário</th>
                <th scope="col">Setor</th>
                <th scope="col">Versão</th>
                <th scope="col">Conta</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offices as $office)
            <tr>
                <td scropt="row">{{ $office->usuario }}</td>
                <td scropt="row">{{ $office->setor }}</td>
                <td scropt="row">{{ $office->versao }}</td>
                <td scropt="row">{{ $office->conta }}</td>
                <td>
                <a href="/editOffice/{{ $office->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteOffice/{{ $office->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $offices->appends($filters)->links() }}
    </div>
    @elseif (count($offices) == 0 && $filters)
    <div class="col-sm-10 col-md-10 offset-md-1">
        <h5><br>Não foi possível retornar resultados com sua busca
        <hr>
        <a href="/Office" style="margin-right: 5px" class="btn btn-success">Ver todos os Offices</a>
        <a href="/cadastroOffice" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Office</a></h5>
    </div>
    @elseif (count($offices)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há Office cadastrado
    <hr>
        <a href="/cadastroOffice" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Office</a></h5>
    </div>
    @endif
</div>
@endsection
