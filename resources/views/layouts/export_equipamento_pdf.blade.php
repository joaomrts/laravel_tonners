<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Equipamentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <caption style="text-align: center"><strong>Equipamentos</strong></caption>
    </div>
            <thead>
                <tr>
                    <th scope="col">Numero Ip</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Equipamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipamentos as $equipamento)
                <tr>
                    <td scropt="row">{{ $equipamento->numeroIp}}</td>
                    <td scropt="row">{{ $equipamento->setor }}</td>
                    <td scropt="row">{{ $equipamento->equipamento }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

</body>

</html>
