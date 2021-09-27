@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <h1 style="text-align: center"><strong>Relatório de Manutenções</strong></h1>
    </div>
    <a href="/Impressoras/manutencao" class="d-print-none btn btn-outline-dark" style="margin-right: 5px"><ion-icon name="close-circle-outline"></ion-icon> Fechar</a>
    <a href="" class="d-print-none btn btn-outline-dark" onclick="javascript:window.print()" title="Imprimir"><ion-icon name="print-outline"></ion-icon> Imprimir</a>
<br>
<br>

    @if (count($manutencaos) == 0)
    <h2 style="text-align: center">MG</h2>
        <hr>
        <h4>Não há manutenções cadastradas</h4>
    @elseif(count($manutencaos) > 0)

    <table class="table table-striped table table-bordered">
        <h2 style="text-align: center"> MG
            <hr>

        </h2>
            <br>
                <thead>
                    <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manutencaos as $manutencao)
                <tr>
                    <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($manutencao->data)->format('d/m/Y')}}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencao->modelo }}</td>
                    <td class="tabela-manutencao-responsavel" scropt="row">{{ $manutencao->responsavel }}</td>
                    <td class="tabela-manutencao-descricao" scropt="row">{{ $manutencao->defeito }}</td>
                    <td class="tabela-manutencao-descricao" scropt="row" >R$ {{ number_format($manutencao->valor, 2, ',', '.')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

<br>
        @if (count($xavantes) == 0)
            <h2 style="text-align: center">Xavantes</h2>
                <hr>
            <h4>Não há manutenções cadastradas</h4>
        @elseif (count($xavantes) > 0)
        <table class="table table-striped table table-bordered">
            <h2 style="text-align: center"> Xavantes
                <hr>
            </h2>
                <br>
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($xavantes as $xavante)
                        <tr>
                            <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($xavante->data)->format('d/m/Y')}}</td>
                            <td class="tabela-manutencao-descricao" scropt="row">{{ $xavante->modelo }}</td>
                            <td class="tabela-manutencao-responsavel" scropt="row">{{ $xavante->responsavel }}</td>
                            <td class="tabela-manutencao-descricao" scropt="row">{{ $xavante->defeito }}</td>
                            <td class="tabela-manutencao-descricao" scropt="row" >R$ {{ number_format($xavante->valor, 2, ',', '.')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
<br>

            @if (count($mendesjrs) == 0)
            <h2 style="text-align: center">Mendes Jr.</h2>
            <hr>
            <h4>Não há manutenções cadastradas</h4>

            @elseif (count($mendesjrs) > 0)
            <table class="table table-striped table table-bordered">
                <h2 style="text-align: center"> Mendes Jr.
                <hr>
                </h2>
                    <br>
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Responsável</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mendesjrs as $mendesjr)
                            <tr>
                                <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($mendesjr->data)->format('d/m/Y')}}</td>
                                <td class="tabela-manutencao-descricao" scropt="row">{{ $mendesjr->modelo }}</td>
                                <td class="tabela-manutencao-responsavel" scropt="row">{{ $mendesjr->responsavel }}</td>
                                <td class="tabela-manutencao-descricao" scropt="row">{{ $mendesjr->descricao }}</td>
                                <td class="tabela-manutencao-descricao" scropt="row" >R$ {{ number_format($mendesjr->valor, 2, ',', '.')}}</td>
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
                                    <th scope="col">Total de Manutenções</th>
                                    <th scope="col">Total em R$</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-success tabela-total-qtde" scope="row">{{ $qtde }}</td>
                                    <td class="bg-success tabela-total-valor" scope="row" scropt="row">R$ {{ number_format($valor, 2, ',', '.')}}</td>
                                </tr>
                            </tbody>
                    </table>
         </div>
    </html>
@endsection
