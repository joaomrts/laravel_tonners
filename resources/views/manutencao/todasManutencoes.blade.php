@extends('layouts.main')

@section('title', 'Souza e Cambos Confecções')

@section('content')


    @if(count($manutencaos)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
            <a href="/Impressoras" id="show" class="btn btn-dark"><ion-icon name="arrow-back"></ion-icon> Voltar</a></h5>
        <div class="dashboard-tinta-container">
            <a href="/Impressoras/manutencao/imprimir" id="show" class="btn btn-outline-dark"><ion-icon name="print-outline"></ion-icon> Imprimir</a></h5>
        </div>
        <br>
        <br>
<table class="table table-striped table table-bordered">
    <h1> MG
        <hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor Total</th>
                    <th class="tabela-compras-acoes">Ações</th>
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
                    <td>
                    <form action="/deleteManutencao/{{ $manutencao->id }}"method="POST" title="Excluir">
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
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeMG }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorMG, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    @elseif (count($manutencaos)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center">MG</h1>
    <br>
        <h5><br>Não há manutencoes cadastradas
    <hr>
        <a href="/Impressoras" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Manutenção</a></h5>
        <br>
    </div>
    @endif
</div>


@if(count($xavantes)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
<table class="table table-striped table table-bordered">
    <h1 style="text-align: center"> Xavantes
<hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor Total</th>
                    <th class="tabela-compras-acoes">Ações</th>
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
                    <td>
                        <form action="/deleteManutencaoX/{{ $xavante->id }}"method="POST" title="Excluir">
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
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeX }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorX, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
    @elseif (count($xavantes)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center">Xavantes</h1>
    <br>
        <h5><br>Não há manutenções cadastradas
    <hr>
        <a href="/Impressoras" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Manutencao</a></h5>
        <br>
    </div>
    @endif
</div>


@if(count($mendesjrs)>0)

    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
<table class="table table-striped table table-bordered">
    <h1 style="text-align: center"> Mendes Jr.
        <hr>
    </h1>
        <br>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor Total</th>
                    <th class="tabela-compras-acoes">Ações</th>
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
                    <td>
                        <form action="/deleteManutencaoMJr/{{ $mendesjr->id }}"method="POST" title="Excluir">
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
                    <td class="tabela-total-qtde" scropt="row">{{ $qtdeMJr }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($valorMJr, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
        <br>
    @elseif (count($mendesjrs)== 0)
    <div class="col-sm-10 col-md-10 offset-md-1 dashboard-events-container">
        <br>
        <h1 style="text-align: center"> Mendes Jr.</h1>
    <br>
        <h5><br>Não há manutenções cadastradas
    <hr>
        <a href="/Impressoras" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Manutenção</a></h5>
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
</div>
@endsection
