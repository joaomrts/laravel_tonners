<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Relatório de Equipamentos com Office Instalado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <table class="table table-striped table-bordered">
        <caption style="text-align: center"><strong>Office</strong></caption>
    </div>
    <thead>
        <tr>
            <th scope="col">Usuário</th>
            <th scope="col">Setor</th>
            <th scope="col">Versão</th>
            <th scope="col">Conta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offices as $office)
        <tr>
            <td scropt="row">{{ $office->usuario }}</td>
            <td scropt="row">{{ $office->setor }}</td>
            <td scropt="row">{{ $office->versao }}</td>
            <td scropt="row">{{ $office->conta }}</td>
        </tr>
                @endforeach
            </tbody>
    </table>

</body>

</html>
