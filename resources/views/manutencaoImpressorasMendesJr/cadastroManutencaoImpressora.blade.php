@extends('layouts.main')

@section('title', 'Cadastrar Manutencao')

@section('content')


<div id="events-create-container" class="col-md-8 offset-md-2 col-sm-10">
    <br>
    <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre a Manutenção</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger col-sm-12 col-md-3 col-lg-3" role="alert">
                <p><strong>{{ $error }}</strong></p>
            </div>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroManutencaoImpressorasMendesJr/salvar" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="impressoraMendesJr_id" id="impressoraMendesJr_id" value="{{ $impressora->id }}">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="modelo" id="modelo" value="{{ $impressora->modelo }}">
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável*</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Nome do responsável..." value="{{ old('responsavel') }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <br>
            <input type="date" class="form-control" name="data" id="data" class="data">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição*</label>
            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descrição da manutenção..." value="{{ old('descricao') }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor*</label>
            <input type="number" step=".01" class="form-control" name="valor" id="valor" placeholder="Valor da manutenção..." value="{{ old('valor') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Manutenção">
        <a href="/Impressoras" class="btn btn-danger">Cancelar</a>
    </form>
</div>


<div id="events-create-container" class="col-md-10 offset-md-1 col-sm-10">
    <hr>
    <h1>Manutenções já feitas em: {{ $impressora->modelo }}</h1>
    @if ((count($manutencaoimpressorasmendesjr) > 0))
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
    <br>
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Responsável</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th class="açoes-manutencao" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($manutencaoimpressorasmendesjr as $manutencaoimpressoramendesjr)
            <tr>
                <td class="tabela-manutencao-responsavel" scropt="row">{{ \Carbon\Carbon::parse($manutencaoimpressoramendesjr->data)->format('d/m/Y')}}</td>
                <td class="tabela-manutencao-data" scropt="row">{{ $manutencaoimpressoramendesjr->responsavel }}</td>
                <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencaoimpressoramendesjr->descricao }}</td>
                <td class="tabela-manutencao-servico" scropt="row">R$ {{ number_format($manutencaoimpressoramendesjr->valor, 2, ',', '.')}}</td>
                <td>
                <a href="/editManutencaoImpressorasMendesJr/{{ $manutencaoimpressoramendesjr->id }}" style="margin-left: 3px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteManutencaoImpressorasMendesJr/{{ $manutencaoimpressoramendesjr->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
            <table class="table table-striped table table-bordered">
                <br>
                    <thead>
                        <tr>
                            <th scope="col">Total de Manutenções</th>
                            <th scope="col">Total em R$</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tabela-total-qtde" scropt="row">{{ $total_qtde }}</td>
                            <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($total_valor, 2, ',', '.')}}</td>
                        </tr>
                    </tbody>
                </table>
        </tbody>
    </table>
    @elseif (count($manutencaoimpressorasmendesjr)== 0)
        <div class="col-sm-8 col-md-8 offset-md-2">
        <br>
            <h5 style="text-align: center">Não há manutenções cadastradas...
        </div>
    @endif
    </div>
</div>

@endsection
