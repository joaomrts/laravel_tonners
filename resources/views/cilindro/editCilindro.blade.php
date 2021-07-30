@extends('layouts.main')

@section('title', 'Editar Cilindro')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/indexCilindro" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite o Cilindro</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/editCilindro/update/{{ $cilindro->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo do Cilindro*</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo do cilindro..." value="{{ $cilindro->modelo }}">
        </div>
        <div class="form-group">
            <label for="qtde_impressora">Quantidade de Impressoras*</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar este cilindro..." value="{{ $cilindro->qtde_impressora }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque*</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade deste cilindro no estoque..." value="{{ $cilindro->estoque }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Cilindro">
        <a href="/indexCilindro" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
