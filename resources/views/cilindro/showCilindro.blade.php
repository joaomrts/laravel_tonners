<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Cilindros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <h1 style="text-align: center"><strong>Cilindros</strong></h1>
    </div>
    <a href="/" class="d-print-none btn btn-dark" style="margin-right: 5px">Fechar</a>
    <a href="" class="d-print-none btn btn-dark" onclick="javascript:window.print()" title="Imprimir">Imprimir</a>
    <hr>
            <thead>
                <tr>
                    <th scope="col">Modelo</th>
                    <th scope="col">Impressoras Compatíveis</th>
                    <th scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cilindros as $cilindro)
                <tr>
                    <td scropt="row">{{ $cilindro->modelo }}</td>
                    <td scropt="row">{{ $cilindro->qtde_impressora }}</td>
                    <td scropt="row">{{ $cilindro->estoque }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

</body>

</html>
