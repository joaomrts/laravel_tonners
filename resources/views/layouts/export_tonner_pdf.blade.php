<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Tonners</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>

    <table class="table table-striped table-bordered">
        <caption style="text-align: center"><strong>Tonners</strong></caption>
            <thead>
                <tr>
                    <th scope="col" class="">Modelo</th>
                    <th scope="col">Impressoras Compatíveis</th>
                    <th scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tonners as $tonner)
                <tr>
                    <td scropt="row">{{ $tonner->modelo }}</td>
                    <td scropt="row">{{ $tonner->qtde_impressora }}</td>
                    <td scropt="row" style="background-color: {{ $tonner->cor }}">{{ $tonner->estoque }}</td>

                </tr>
                @endforeach
            </tbody>
    </table>
</body>

</html>
