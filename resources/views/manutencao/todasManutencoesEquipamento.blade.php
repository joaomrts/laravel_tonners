@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


    @if(count($manutencaos)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
            <a href="/" id="show" class="btn btn-dark"><ion-icon name="arrow-back"></ion-icon> Voltar</a></h5>
        <div class="dashboard-tinta-container">
            <a href="manutencao/imprimir" id="show" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
        <br>
<table class="table table-striped table table-bordered">
    <h1> Manutenções
        <hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th class="tabela-compras-acoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manutencaos as $manutencao)
                <tr>
                    <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($manutencao->data)->format('d/m/Y')}}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencao->numeroIp }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencao->equipamento }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencao->responsavel }}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencao->servico }}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencao->descricao }}</td>
                    <td class="tabela-manutencao-descricao" scropt="row" >R$ {{ number_format($manutencao->valor, 2, ',', '.')}}</td>
                    <td>
                    <form action="/manutencao/{{ $manutencao->id }}"method="POST" title="Excluir">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
                    <td class="tabela-total-qtde" scropt="row">{{ $qtde }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valor, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    @elseif (count($manutencaos)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center">Manutenções</h1>
    <br>
        <h5><br>Não há manutencoes cadastradas
    <hr>
        <a href="/" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Manutenção</a></h5>
        <br>
    </div>
    @endif
</div>


@endsection
