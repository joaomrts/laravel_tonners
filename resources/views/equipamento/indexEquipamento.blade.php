@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')



    @if(count($equipamentos)>0)
    <div id="search-container-equipamento" class="col-sm-12 col-md-12">
        <h1>EQUIPAMENTOS</h1>
        <form action="/search" method="POST">
            @csrf
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-bordered">
        <div class="dashboard-tinta-container">
            <a href="/Office"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="logo-windows"></ion-icon> Office</a>
            <a href="/Suprimentos"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-filter-outline"></ion-icon> Suprimentos</a>
            <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
        <br>
        </div>
        <br>
        <hr>
        <a href="/cadastroEquipamento" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Equipamento</a></h5>
        <div class="dashboard-tinta-container">
            <a href="equipamento/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showEquipamento" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
    <br>
        <thead>
            <tr>
                <th scope="col">Nr Ip</th>
                <th scope="col">Setor</th>
                <th scope="col">Equipamento</th>
                <th class="açoes-equipamento" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
            <tr>
                <td class="tabela-equipamentos-ip" style="background-color: {{ $equipamento->cor }}">{{ $equipamento->numeroIp }}</td>
                <td class="tabela-equipamentos-setor" scropt="row">{{ $equipamento->setor }}</td>
                <td class="tabela-equipamentos-equipamento" scropt="row">{{ $equipamento->equipamento }}</td>
                <td>
                <a href="/editEquipamento/{{ $equipamento->id }}" style="margin-left: 5px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteEquipamento/{{ $equipamento->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                <a href="/cadastroManutencao/{{ $manutencao->id }}" style="margin-left: 5px" class="btn btn-success"><ion-icon name="construct-outline"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $equipamentos->appends($filters)->links() }}
    </div>
    @elseif (count($equipamentos) == 0 && $filters)
    <div class="col-sm-10 col-md-10 offset-md-1">
        <h5><br>Não foi possível retornar resultados com sua busca para Equipamentos
        <hr>
        <a href="/" style="margin-right: 5px" class="btn btn-success">Ver todos os Equipamentos</a>
        <a href="/cadastroEquipamento" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Equipamento</a></h5>
    </div>
    @elseif (count($equipamentos)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há equipamentos cadastrados
    <hr>
        <a href="/cadastroEquipamento" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Equipamentos</a></h5>
    </div>
    @endif
</div>
@endsection
