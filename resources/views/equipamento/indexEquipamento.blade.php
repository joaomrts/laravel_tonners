@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')



    @if(count($equipamentos)>0)
    <div id="search-container-equipamento" class="col-sm-12 col-md-12">
        <h1>EQUIPAMENTOS</h1>
        <form action="/indexEquipamento" method="POST">
            @csrf
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
        <div class="dashboard-tinta-container">
            <a href="/indexTonner"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-filter-outline"></ion-icon> Suprimentos</a>
            <a href="/indexImpressora" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
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
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
            <tr>
                <td scropt="row">{{ $equipamento->numeroIp }}</td>
                <td scropt="row">{{ $equipamento->setor }}</td>
                <td scropt="row">{{ $equipamento->equipamento }}</td>
                <td>
                <a href="/editEquipamento/{{ $equipamento->id }}" style="margin-left: 35px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteEquipamento/{{ $equipamento->id }}" method="POST">
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
        {{ $equipamentos->appends($filters)->links() }}
    @else
    @endif
        @elseif (count($equipamentos) == 0)
        <br>
        <h5><br>Não há Equipamentos cadastrados
            <hr>
            <a href="/cadastroEquipamento" id="cadastro" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Equipamento</a></h5>
            <div class="dashboard-tinta-container">
                <a href="/indexCilindro" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="film-outline"></ion-icon> Cilindros</a></h5>
                <a href="/indexTinta" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="color-palette-outline"></ion-icon> Tintas</a></h5>
                <a href="/indexTonner"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="repeat-outline"></ion-icon> Tonners</a>
                <a href="/indexImpressora" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="print-outline"></ion-icon> Impressoras</a></h5>
            </div>
    @endif
</div>
@endsection
