@extends('layouts.main')

@section('title', 'Editar Manutenção')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="{{ $url }}" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Manutenção</h1>
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
    <form action="/editManutencaoImpressora/update/{{ $manutencaoImpressora->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="responsavel">Responsável*</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Nome do responsável..." value="{{ $manutencaoImpressora->responsavel }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <br>
            <input type="date" class="form-control" name="data" id="data" class="data" value="{{ $manutencaoImpressora->data }}">
        </div>
        <div class="form-group">
            <label for="defeito">Descrição*</label>
            <input type="text" name="defeito" id="defeito" class="form-control" placeholder="Descrição da manutenção..." value="{{ $manutencaoImpressora->defeito }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor*</label>
            <input type="number" step=".01" class="form-control" name="valor" id="valor" placeholder="Valor da manutenção..." value="{{ $manutencaoImpressora->valor }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Manutenção">
        <a href="{{ $url }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
