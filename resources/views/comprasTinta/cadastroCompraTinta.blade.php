@extends('layouts.main')

@section('title', 'Compras Tinta')

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.money').mask('#.##0,00', {reverse: true});
    });
</script>
@endsection
@section('content')

<div id="events-create-container" class="col-md-8 offset-md-2 col-sm-10">
    <br>
    <a href="/Suprimentos" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre a Compra</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger col-sm-12 col-md-3 col-lg-3" role="alert">
                <p><strong>{{ $error }}</strong></p>
            </div>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroCompraTinta/salvar" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="tinta_id" id="tinta_id" value="{{ $tinta->id }}">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="modelo" id="modelo" value="{{ $tinta->modelo  }}">
        </div>
        <div class="form-group">
            <label for="fornecedor">Fornecedor*</label>
            <input type="text" class="form-control" name="fornecedor" id="fornecedor" placeholder="Razão social do fornecedor..." value="{{ old('fornecedor') }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <br>
            <input type="date" class="form-control" name="data" id="data" class="data" value="{{ old('data') }}" >
        </div>
        <div class="form-group">
            <label for="qtde">Quantidade*</label>
            <input type="number" class="form-control" name="qtde" id="qtde" placeholder="Quantidade..." value="{{ old('qtde') }}">
        </div>
        <div class="form-group">
            <label for="valor_un">Valor Unitário*</label>
            <input type="number" step=".01" class="form-control" name="valor_un" id="valor_un" placeholder="Valor unitário..." value="{{ old('valor_un') }}">
        </div>
        <br>

        <input type="submit" class="btn btn-success" value="Cadastrar Compra">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>


<div id="events-create-container" class="col-md-10 offset-md-1 col-sm-10">
    <hr>
    <h1>Compras da Tinta {{$tinta->modelo}}</h1>
    @if ((count($comprasTintas) > 0))
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
    <br>
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Modelo</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Total</th>
                <th class="açoes-manutencao" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comprasTintas as $comprasTinta)
            <tr>
                <td class="tabela-compra-tinta-data" scropt="row">{{ \Carbon\Carbon::parse($comprasTinta->data)->format('d/m/Y')}}</td>
                <td class="tabela-compra-tinta-modelo" scropt="row">{{ $tinta->modelo }}</td>
                <td class="tabela-compra-tinta-fornecedor" scropt="row">{{ $comprasTinta->fornecedor }}</td>
                <td class="tabela-compra-tinta-qtde" scropt="row">{{ $comprasTinta->qtde }}</td>
                <td class="tabela-compra-tinta-un" scropt="row" >R$ {{ number_format($comprasTinta->valor_un, 2, ',', '.')}}</td>
                <td class="tabela-compra-tinta-total" scropt="row">R$ {{ number_format($comprasTinta->valor_total, 2, ',', '.')}}</td>
                <td>
                <a href="/editCompraTinta/{{ $comprasTinta->id }}" style="margin-left: 3px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteCompraTinta/{{ $comprasTinta->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')){ return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
            <table class="table table-striped table table-bordered">
                <br>
                    <thead>
                        <tr>
                            <th scope="col">Total de Tintas Compradas</th>
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
        </tbody>
    </table>
        <br>
    @elseif (count($comprasTintas)== 0)
        <div class="col-sm-8 col-md-8 offset-md-2">
        <br>
            <h5 style="text-align: center">Não há compras cadastradas...
        </div>
    @endif
    </div>
</div>

@endsection
