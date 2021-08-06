@extends('layouts.main')

@section('title', 'Cadastrar Cilindro')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Suprimentos" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre o Cilindro</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroCilindro/salvar" method="POST">
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo do Cilindro*</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo do Cilindro..." value="{{ old('modelo') }}">
        </div>
        <div class="form-group">
            <label for="qtde_tinta">Quantidade de Impressoras Compatíveis*</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar este cilindro..." value="{{ old('qtde_impressora') }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque*</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade deste cilindro no estoque..." value="{{ old('estoque') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Cilindro">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
