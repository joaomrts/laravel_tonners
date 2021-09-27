@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <h1 style="text-align: center"><strong>Relatório de Compras</strong></h1>
    </div>
    <a href="/Suprimentos/compras" class="d-print-none btn btn-outline-dark" style="margin-right: 5px"><ion-icon name="close-circle-outline"></ion-icon> Fechar</a>
    <a href="" class="d-print-none btn btn-outline-dark" onclick="javascript:window.print()" title="Imprimir"><ion-icon name="print-outline"></ion-icon> Imprimir</a>
<br>
<br>
    @if (count($tonners) == 0)
        <h3 style="text-align: center">Tonners</h3>
        <hr>
        <h4>Não há compras cadastradas</h4>
    @elseif (count($tonners) > 0)

    <table class="table table-striped table table-bordered">
        <h2 style="text-align: center"> Tonners
            <hr>
        </h2>
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
                        <td class="tabela-manutencao-tipo" scropt="row" >R$ {{ number_format($tonner->valor_un, 2, ',', '.')}}</td>
                        <td class="tabela-manutencao-tipo" scropt="row">R$ {{ number_format($tonner->valor_total, 2, ',', '.')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif


        @if (count($tintas) == 0)
            <h3 style="text-align: center">Tintas</h3>
            <hr>
            <h4>Não há compras cadastradas</h4>
        @elseif (count($tintas) > 0)
        <table class="table table-striped table table-bordered">
            <h2 style="text-align: center"> Tintas
                <hr>
            </h2>
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
                            <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($tonner->data)->format('d/m/Y')}}</td>
                            <td class="tabela-manutencao-responsavel" scropt="row">{{ $tinta->modelo }}</td>
                            <td class="tabela-manutencao-responsavel" scropt="row">{{ $tinta->fornecedor }}</td>
                            <td class="tabela-manutencao-tipo" scropt="row">{{ $tinta->qtde }}</td>
                            <td class="tabela-manutencao-tipo" scropt="row" >R$ {{ number_format($tinta->valor_un, 2, ',', '.')}}</td>
                            <td class="tabela-manutencao-tipo" scropt="row">R$ {{ number_format($tinta->valor_total, 2, ',', '.')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

@if (count($ciliondros) == 0)
<h3 style="text-align: center">Cilindros</h3>
<hr>
<h4>Não há compras cadastradas</h4>
@elseif (count($cilindros) > 0)

            <table class="table table-striped table table-bordered">
                <h2 style="text-align: center"> Cilindros
                    <hr>
                </h2>
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
                                <td class="tabela-manutencao-tipo" scropt="row" >R$ {{ number_format($cilindro->valor_un, 2, ',', '.')}}</td>
                                <td class="tabela-manutencao-tipo" scropt="row">R$ {{ number_format($cilindro->valor_total, 2, ',', '.')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <div class="col-sm-12 col-md-12 dashboard-events-container">
                    <table class="table table-bordered table-dark">
                        <h1 style="text-align: center"> Total
                            <hr>
                            <thead>
                                <tr>
                                    <th scope="col">Total de Compras</th>
                                    <th scope="col">Total de Itens</th>
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
</html>
@endsection
