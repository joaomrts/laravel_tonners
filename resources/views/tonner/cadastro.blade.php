@extends('layouts.main')

@section('title', 'Cadastrar Tonner')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Suprimentos" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre o Tonner</h1>
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
    <form action="/cadastro/salvar" method="POST">
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo do tonner*</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo do tonner..." value="{{ old('modelo') }}">
        </div>
        <div class="form-group">
            <label for="preco">Quantidade de Impressoras*</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar este tonner..." value="{{ old('qtde_impressora') }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque*</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade deste tonner no estoque..." value="{{ old('estoque') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Tonner">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
