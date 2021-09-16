<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Manutenções</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <br>
        <h1 style="text-align: center"><strong>Manutenções</strong></h1>
    </div>
    <a href="/manutencao" class="d-print-none btn btn-outline-dark" style="margin-right: 5px"><ion-icon name="close-circle-outline"></ion-icon> Fechar</a>
    <a href="" class="d-print-none btn btn-outline-dark" onclick="javascript:window.print()" title="Imprimir"><ion-icon name="print-outline"></ion-icon> Imprimir</a>
    <hr>
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Ip</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($manutencaos as $manutencao)
                <tr>
                    <td scropt="row">{{ $manutencao->data }}</td>
                    <td scropt="row">{{ $manutencao->numeroIp }}</td>
                    <td scropt="row">{{ $manutencao->equipamento }}</td>
                    <td scropt="row">{{ $manutencao->responsavel }}</td>
                    <td scropt="row">{{ $manutencao->servico }}</td>
                    <td scropt="row">{{ $manutencao->descricao }}</td>
                    <td scropt="row">{{ $manutencao->valor }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>
