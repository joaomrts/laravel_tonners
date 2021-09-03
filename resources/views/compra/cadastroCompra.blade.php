@extends('layouts.main')

@section('title', 'Compras Tonner')

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
    <h1>Cadastre a Compra</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroCompra/salvar" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="tonner_id" id="tonner_id" value="{{ $tonner->id }}">
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
    <h1>Compras do Tonner {{$tonner->modelo}}</h1>
    @if ((count($compras) > 0))
    <div class="col-md-10 col-sm-10 offset-md-1 dashboard-events-container">
        <br>
    <table class="table table-striped table table-bordered">
    <br>
        <thead>
            <tr>
                <th scope="col">Fornecedor</th>
                <th scope="col">Data</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Total</th>
                <th class="açoes-manutencao" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td class="tabela-manutencao-responsavel" scropt="row">{{ $compra->fornecedor }}</td>
                <td class="tabela-manutencao-data" scropt="row">{{ \Carbon\Carbon::parse($compra->data)->format('d/m/Y')}}</td>
                <td class="tabela-manutencao-tipo" scropt="row">{{ $compra->qtde }}</td>
                <td class="tabela-manutencao-servico" scropt="row" >R$ {{ number_format($compra->valor_un, 2, ',', '.')}}</td>
                <td class="tabela-manutencao-descricao" scropt="row">R$ {{ number_format($compra->valor_total, 2, ',', '.')}}</td>
                <td>
                <a href="/editCompra/{{ $compra->id }}" style="margin-left: 3px" class="btn btn-primary edit-btn"><ion-icon name="create-outline"></ion-icon></a>
                <form action="/deleteCompra/{{ $compra->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon></button>
                </form>
                </td>
            </tr>
            @endforeach
            <table class="table table-striped table table-bordered">
                <br>
                    <thead>
                        <tr>
                            <th scope="col">Total de Tonners Comprados</th>
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

        <div class="d-flex justify-content-center">
            {{ $compras->appends($filters)->links() }}
        </div>
    @elseif (count($compras) == 0 && $filters)
        <div class="col-sm-8 col-md-8 offset-md-2">
            <h5><br>Não foi possível retornar resultados com sua busca.
        </div>
    @elseif (count($compras)== 0)
        <div class="col-sm-8 col-md-8 offset-md-2">
        <br>
            <h5 style="text-align: center">Não há compras cadastradas...
        </div>
    @endif
    </div>
</div>

@endsection