<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Tintas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <h1 style="text-align: center"><strong>Tintas</strong></h1>
    </div>
    <a href="/Suprimentos" class="d-print-none btn btn-outline-dark" style="margin-right: 5px"><ion-icon name="close-circle-outline"></ion-icon> Fechar</a>
    <a href="" class="d-print-none btn btn-outline-dark" onclick="javascript:window.print()" title="Imprimir"><ion-icon name="print-outline"></ion-icon> Imprimir</a>
    <hr>
            <thead>
                <tr>
                    <th scope="col">Modelo</th>
                    <th scope="col">Impressoras Compatíveis</th>
                    <th scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tintas as $tinta)
                <tr>
                    <td scropt="row">{{ $tinta->modelo }}</td>
                    <td scropt="row">{{ $tinta->qtde_impressora }}</td>
                    <td scropt="row">{{ $tinta->estoque }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>
