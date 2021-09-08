<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Compras de Cilindros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <caption style="text-align: center"><strong>COmpras de Cilindros</strong></caption>
    </div>
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
                    <td class="tabela-total-qtde" scropt="row">{{ $total_qtde }}</td>
                    <td class="tabela-total-valor" style="background-color: #c8ffd4" scropt="row">R$ {{ number_format($total_valor, 2, ',', '.')}}</td>
                </tr>
            </tbody>
        </table>
            <thead>
                <tr>
                <th scope="col">Fornecedor</th>
                <th scope="col">Data</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comprasCilindros as $comprasCilindro)
            <tr>
                <td class="tabela-manutencao-responsavel" scropt="row">{{ $comprasCilindro->fornecedor }}</td>
                <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($comprasCilindro->data)->format('d/m/Y')}}</td>
                <td class="tabela-manutencao-tipo" scropt="row">{{ $comprasCilindro->qtde }}</td>
                <td class="tabela-manutencao-servico" scropt="row" >R$ {{ number_format($comprasCilindro->valor_un, 2, ',', '.')}}</td>
                <td class="tabela-manutencao-descricao" scropt="row">R$ {{ number_format($comprasCilindro->valor_total, 2, ',', '.')}}</td>
            </tr>
            @endforeach
            </tbody>
    </table>

</body>

</html>
