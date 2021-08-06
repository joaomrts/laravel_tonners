@extends('layouts.main')

@section('title', 'Cadastrar Impressora Xavantes')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Cadastre a Impressora</h1>
    <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/cadastroImpressorasMendesJr/salvar" method="POST">
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo da Impressora*</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo da Impressora..." value="{{ old('modelo') }}">
        </div>
        <div class="form-group">
            <label for="tonner">Tonner*</label>
            <input type="text" name="tonner" id="tonner" class="form-control" placeholder="Tonner compatível com esta Impressora..." value="{{ old('tonner') }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor da Impressora..." value="{{ old('setor') }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Cadastrar Impressora">
        <a href="/Impressoras" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
