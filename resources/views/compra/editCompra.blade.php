@extends('layouts.main')

@section('title', 'Editar Compra')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Suprimentos" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Compra</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/editCompra/update/{{ $compra->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fornecedor">Fornecedor*</label>
            <input type="text" class="form-control" name="fornecedor" id="fornecedor" placeholder="Fornecedor..." value="{{ $compra->fornecedor }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <input type="date" class="form-control" name="data" id="data" placeholder="Data..." value="{{ $compra->data }}">
        </div>
        <div class="form-group">
            <label for="qtde">Quantidade*</label>
            <input type="number" class="form-control" name="qtde" id="qtde" placeholder="Quantidade..." value="{{ $compra->qtde }}">
        </div>
        <div class="form-group">
            <label for="valor_un">Valor Unitário*</label>
            <input type="number" step=".01" class="form-control" name="valor_un" id="valor_un" placeholder="Valor unitário..." value="{{ $compra->valor_un }}">
        </div>
        <div class="form-group">
            <label for="valor_un">Valor Total*</label>
            <input type="number" step=".01" class="form-control" name="valor_total" id="valor_total" placeholder="Valor total..." value="{{ $compra->valor_total }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Compra">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
