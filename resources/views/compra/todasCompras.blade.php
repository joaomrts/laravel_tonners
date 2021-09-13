@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


    @if(count($tonners)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
            <a href="{{ URL::previous() }}" id="show" class="btn btn-dark"><ion-icon name="arrow-back"></ion-icon> Voltar</a></h5>
        <div class="dashboard-tinta-container">
            <a href="/Suprimentos/compras/imprimir" id="show" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
        <br>
<table class="table table-striped table table-bordered">
    <h1> Tonners
        <hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tonners as $tonner)
                <tr>
                    <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($tonner->data)->format('d/m/Y')}}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $tonner->modelo }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $tonner->fornecedor }}</td>
                    <td class="tabela-manutencao-tipo" scropt="row">{{ $tonner->qtde }}</td>
                    <td class="tabela-manutencao-servico" scropt="row" >R$ {{ number_format($tonner->valor_un, 2, ',', '.')}}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">R$ {{ number_format($tonner->valor_total, 2, ',', '.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped table table-bordered">
        <br>
            <thead>
                <tr>
                    <th scope="col">Total de Tonners Comprados</th>
                    <th scope="col">Total em R$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeTonners }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorTonners, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    @elseif (count($tonners)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center">Tonners</h1>
    <br>
        <h5><br>Não há compras cadastradas
    <hr>
        <a href="/Suprimentos" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Compra</a></h5>
        <br>
    </div>
    @endif
</div>


@if(count($tintas)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
<table class="table table-striped table table-bordered">
    <h1 style="text-align: center"> Tintas
<hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tintas as $tinta)
                <tr>
                    <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($tinta->data)->format('d/m/Y')}}</td>
                    <td class="tabela-compra-tinta-modelo" scropt="row">{{ $tinta->modelo }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $tinta->fornecedor }}</td>
                    <td class="tabela-manutencao-tipo" scropt="row">{{ $tinta->qtde }}</td>
                    <td class="tabela-manutencao-servico" scropt="row" >R$ {{ number_format($tinta->valor_un, 2, ',', '.')}}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">R$ {{ number_format($tinta->valor_total, 2, ',', '.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped table table-bordered">
        <br>
            <thead>
                <tr>
                    <th scope="col">Total de Tintas Compradas</th>
                    <th scope="col">Total em R$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeTintas }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorTintas, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    @elseif (count($tinta)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center">Tintas</h1>
    <br>
        <h5><br>Não há compras cadastradas
    <hr>
        <a href="/Suprimentos" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Compra</a></h5>
        <br>
    </div>
    @endif
</div>


@if(count($cilindros)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
<table class="table table-striped table table-bordered">
    <h1 style="text-align: center"> Cilindros
        <hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cilindros as $cilindro)
                <tr>
                    <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($cilindro->data)->format('d/m/Y')}}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $cilindro->modelo }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $cilindro->fornecedor }}</td>
                    <td class="tabela-manutencao-tipo" scropt="row">{{ $cilindro->qtde }}</td>
                    <td class="tabela-manutencao-servico" scropt="row" >R$ {{ number_format($cilindro->valor_un, 2, ',', '.')}}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">R$ {{ number_format($cilindro->valor_total, 2, ',', '.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-striped table table-bordered">
        <br>
            <thead>
                <tr>
                    <th scope="col">Total de Cilindros Comprados</th>
                    <th scope="col">Total em R$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeCilindros }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorCilindros, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
        <br>
    @elseif (count($cilindro)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center"> Cilindros</h1>
    <br>
        <h5><br>Não há compras cadastradas
    <hr>
        <a href="/Suprimentos" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Compra</a></h5>
        <br>
        <br>
    </div>
    @endif
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-bordered table-dark">
        <h1 style="text-align: center"> Total
            <hr>
            <thead>
                <tr>
                    <th scope="col">Total de Compras</th>
                    <th scope="col">Total de Itens Comprados</th>
                    <th scope="col">Total em R$</th>
                    <th scope="col">Valor Médio por Compra</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-success tabela-total-qtde" scope="row">{{ $compraTotal }}</td>
                    <td class="bg-success tabela-total-qtde" scope="row">{{ $itensTotal  }}</td>
                    <td class="bg-success tabela-total-valor" scope="row" scropt="row">R$ {{ number_format($valorTotal, 2, ',', '.')}}</td>
                    <td class="bg-success tabela-total-qtde" scope="row">R$ {{ number_format($media, 2, ',', '.') }}</td>
                </tr>
            </tbody>
    </table>
    </div>
</div>
@endsection
