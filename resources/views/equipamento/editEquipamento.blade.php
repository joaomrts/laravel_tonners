@extends('layouts.main')

@section('title', 'Editar Equipamento')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite o Equipamento</h1>
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
    <form action="/editEquipamento/update/{{ $equipamento->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Numero do Ip*</label>
            <input type="text" class="form-control" name="numeroIp" id="numeroIp" placeholder="Numero do Ip..." value="{{ $equipamento->numeroIp }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor do Equipamento..." value="{{ $equipamento->setor }}">
        </div>
        <div class="form-group">
            <label for="equipamento">Equipamento*</label>
            <input type="text" name="equipamento" id="equipamento" class="form-control" placeholder="Tipo do Equipamento..." value="{{ $equipamento->equipamento }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Equipamento">
        <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
