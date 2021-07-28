@extends('layouts.main')

@section('title', 'Editar Manutenção')

@section('content')


<div id="events-create-container" class="col-md-6 offset-md-0">
    <h1>Edite o Tonner</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/edit/update/{{ $tonner->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo do tonner:</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo do tonner..." value="{{ $tonner->modelo }}">
        </div>
        <div class="form-group">
            <label for="qtde_impressora">Quantidade de Impressoras</label>
            <input type="number" name="qtde_impressora" id="qtde_impressora" class="form-control" placeholder="Quantidade de impressoras que irão usar este tonner..." value="{{ $tonner->qtde_impressora }}">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Quantidade deste tonner no estoque..." value="{{ $tonner->estoque }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Tonner">
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
