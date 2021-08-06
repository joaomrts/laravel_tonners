@extends('layouts.main')

@section('title', 'Cadastrar Tinta')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Suprimentos" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre a Tinta</h1>
    <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroTinta/salvar" method="POST">
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo da Tinta*</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo da tinta..." value="{{ old('modelo') }}">
        </div>
        <div class="form-group">
            <label for="qtde_tinta">Quantidade de Impressoras*</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar esta tinta..." value="{{ old('qtde_impressora') }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque*</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade desta tinta no estoque..." value="{{ old('estoque') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Tinta">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
