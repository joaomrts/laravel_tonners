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
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroManutencaoImpressorasXavantes/salvar" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="impressoraXavantes_id" id="impressoraXavantes_id" value="{{ $impressora->id }}">
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
            <label for="defeito">Descrição*</label>
            <input type="text" name="defeito" id="defeito" class="form-control" placeholder="Descrição da manutenção..." value="{{ old('defeito') }}">
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
    @if ((count($manutencaoimpressorasxavantes) > 0))
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
            @foreach ($manutencaoimpressorasxavantes as $manutencaoimpressoraxavantes)
            <tr>
                <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencaoimpressoraxavantes->responsavel }}</td>
                <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($manutencaoimpressoraxavantes->data)->format('d/m/Y')}}</td>
                <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencaoimpressoraxavantes->defeito }}</td>
                <td class="tabela-manutencao-servico" scropt="row">R$ {{ number_format($manutencaoimpressoraxavantes->valor, 2, ',', '.')}}</td>
                <td>
                <a href="/editManutencaoImpressorasXavantes/{{ $manutencaoimpressoraxavantes->id }}" style="margin-left: 3px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteManutencaoImpressorasXavantes/{{ $manutencaoimpressoraxavantes->id }}" method="POST">
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
        <div class="d-flex justify-content-center">
            {{ $manutencaoimpressorasxavantes->appends($filters)->links() }}
        </div>
    @elseif (count($manutencaoimpressorasxavantes) == 0 && $filters)
        <div class="col-sm-8 col-md-8 offset-md-2">
            <h5><br>Não foi possível retornar resultados com sua busca.
        </div>
    @elseif (count($manutencaoimpressorasxavantes)== 0)
        <div class="col-sm-8 col-md-8 offset-md-2">
        <br>
            <h5 style="text-align: center">Não há manutenções cadastradas...
        </div>
    @endif
    </div>
</div>

@endsection
