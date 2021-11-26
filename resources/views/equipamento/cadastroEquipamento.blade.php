@extends('layouts.main')

@section('title', 'Cadastrar Equipamento')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre o Equipamento</h1>
        <hr>
    @if ($errors->any())
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger col-sm-12 col-md-3 col-lg-3" role="alert">
                <p><strong>{{ $error }}</strong></p>
            </div>
            @endforeach
    @endif
    <form action="/cadastroEquipamento/salvar" method="POST">
        @csrf
        <div class="form-group">
            <label for="numeroIp">Numero Ip*</label>
            <input type="number" class="form-control" name="numeroIp" id="numeroIp" placeholder="Numero do Ip..." value="{{ old('numeroIp') }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor do equipamento..." value="{{ old('setor') }}">
        </div>
        <div class="form-group">
            <label for="equipamento">Equipamento*</label>
            <input type="text" name="equipamento" id="equipamento" class="form-control" placeholder="Tipo do equipamento..." value="{{ old('equipamento') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Equipamento">
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
