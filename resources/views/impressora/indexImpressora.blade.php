@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


    @if(count($impressoras)>0)

    <div id="search-container" class="col-sm-12 col-md-12">
        <h1>IMPRESSORAS</h1>
        <form action="/Impressoras" method="POST">
            @csrf
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
<table class="table table-striped table table-bordered">
    <div class="dashboard-tinta-container">
        <a href="{{ route('bots') }}"  style="margin-right: 5px" class="btn btn-dark"><ion-icon name="logo-android"></ion-icon> Bots</a>
        <a href="/Office" style="margin-left: 5px" class="btn btn-dark"><ion-icon name="logo-windows"></ion-icon> Office</a>
        <a href="/Suprimentos" class="btn btn-dark"><ion-icon name="color-filter-outline"></ion-icon> Suprimentos</a>
    </div>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="home-outline"></ion-icon> Início</a></h5>
    <h1> Minas Gerais
        <hr>
        <a href="/cadastroImpressora" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="/Impressoras/manutencao" style="margin-left: 5px" class="btn btn-outline-dark"><ion-icon name="construct-outline"></ion-icon> Manutenções</a>
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
                <th class="açoes-impressora" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impressoras as $impressora)
            <tr>
                <td class="tabela-impressora-modelo" scropt="row">{{ $impressora->modelo }}</td>
                <td class="tabela-impressora-tonner" scropt="row">{{ $impressora->tonner }}</td>
                <td class="tabela-impressora-setor" scropt="row">{{ $impressora->setor }}</td>
                <td>
                <a href="/editImpressora/{{ $impressora->id }}" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <a href="/Impressoras/manutencao/MG/{{ $impressora->id }}" style="margin-left: 3px" class="btn btn-success edit-btn"><ion-icon name="construct-outline"></ion-icon></a>
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
    @elseif (count($impressoras) == 0 && $filters)
    <div class="col-sm-10 col-md-10 offset-md-1 ">
        <h5><br>Não foi possível retornar resultados com sua busca para Impressorass
    <hr>
        <a href="/Impressoras" class="btn btn-success">Ver todas as Impressoras</a>
        <a href="/cadastroImpressora" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @elseif (count($impressoras)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há impressoras cadastrados
    <hr>
        <a href="/cadastroImpressora" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @endif
</div>


<div class="col-md-6 col-sm-10 dashboard-events-container">
    @if(count($impressorasXavantess)>0)
    <br>
<table class="table table-striped table table-bordered">
    <div class="col-md-12 col-sm-12  dashboard-mendes-container">
    <h1>Xavantes
        <hr>
        <a href="/cadastroImpressorasXavantes" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="impressorasXavantes/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showImpressorasXavantes" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
    </h1>
    </div>
    <br>
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Tonner</th>
                <th scope="col">Setor</th>
                <th class="açoes-impressora-sp" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impressorasXavantess as $impressorasXavantes)
            <tr>
                <td class="tabela-impressora-modelo-sp" scropt="row">{{ $impressorasXavantes->modelo }}</td>
                <td class="tabela-impressora-tonner-sp" scropt="row">{{ $impressorasXavantes->tonner }}</td>
                <td class="tabela-impressora-setor-sp" scropt="row">{{ $impressorasXavantes->setor }}</td>
                <td>
                <a href="/editImpressorasXavantes/{{ $impressorasXavantes->id }}" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <a href="/Impressoras/manutencao/xavantes/{{ $impressorasXavantes->id }}" style="margin-left: 3px" class="btn btn-success edit-btn"><ion-icon name="construct-outline"></ion-icon></a>
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
    @elseif (count($impressorasXavantess) == 0 && $filters)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não foi possível retornar resultados com sua busca para Impressoras
    <hr>
        <a href="/Impressoras" style="margin-right: 5px" class="btn btn-success">Ver todas as Impressoras</a>
        <a href="/cadastroImpressorasXavantes" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @elseif (count($impressorasXavantess)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há impressoras Xavantes cadastradas
    <hr>
        <a href="/cadastroImpressorasXavantes" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @endif
</div>


<div class="col-md-6 col-sm-10  dashboard-events-container">
    @if(count($impressorasMendesJrs)>0)
    <br>
<table class="table table-striped table table-bordered">
    <div class="col-md-12 col-sm-12  dashboard-mendes-container">
    <h1>Mendes Jr.
        <hr>
        <a href="/cadastroImpressorasMendesJr" id="cadastro" style="margin-bottom: 18px" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
        <div class="dashboard-tinta-container">
            <a href="impressorasMendesJr/create-pdf" type="button" class="btn btn-outline-dark"><ion-icon name="cloud-download-outline"></ion-icon> Download Pdf</a>
            <a href="/showImpressorasMendesJr" id="show" style="margin-right: 5px" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
    </h1>
    </div>
    <br>
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Tonner</th>
                <th scope="col">Setor</th>
                <th class="açoes-impressora-sp" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impressorasMendesJrs as $impressorasMendesJr)
            <tr>
                <td class="tabela-impressora-modelo-sp" scropt="row">{{ $impressorasMendesJr->modelo }}</td>
                <td class="tabela-impressora-tonner-sp" scropt="row">{{ $impressorasMendesJr->tonner }}</td>
                <td class="tabela-impressora-setor-sp" scropt="row">{{ $impressorasMendesJr->setor }}</td>
                <td>
                <a href="/editImpressorasMendesJr/{{ $impressorasMendesJr->id }}" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <a href="/Impressoras/manutencao/MendesJr/{{ $impressorasMendesJr->id }}" style="margin-left: 3px" class="btn btn-success edit-btn"><ion-icon name="construct-outline"></ion-icon></a>
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

    @elseif (count($impressorasMendesJrs) == 0 && $filters)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não foi possível retornar resultados com sua busca para Impressoras
    <hr>
        <a href="/Impressoras" style="margin-right: 5px" class="btn btn-success">Ver todas as Impressoras</a>
        <a href="/cadastroImpressorasMendesJr" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @elseif (count($impressorasMendesJrs)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1">
    <br>
        <h5><br>Não há impressoras Mendes Junior cadastradas
    <hr>
        <a href="/cadastroimpressorasMendesJr" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Impressora</a></h5>
    </div>
    @endif
</div>
@endsection
