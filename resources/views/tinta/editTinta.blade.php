@extends('layouts.main')

@section('title', 'Editar Tinta')

@section('content')


<div id="events-create-container" class="col-md-6 offset-md-0">
    <h1>Edite a Tinta</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/editTinta/update/{{ $tinta->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo da tinta:</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo da tinta..." value="{{ $tinta->modelo }}">
        </div>
        <div class="form-group">
            <label for="qtde_impressora">Quantidade de Impressoras</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar esta tinta..." value="{{ $tinta->qtde_impressora }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade desta tinta no estoque..." value="{{ $tinta->estoque }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Tinta">
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
