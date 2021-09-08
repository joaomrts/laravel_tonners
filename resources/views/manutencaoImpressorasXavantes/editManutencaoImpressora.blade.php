@extends('layouts.main')

@section('title', 'Editar Manutenção')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Manutenção</h1>
        <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/editManutencaoImpressorasXavantes/update/{{ $manutencaoImpressorasXavantes->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="responsavel">Responsável*</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" placeholder="Nome do responsável..." value="{{ $manutencaoImpressorasXavantes->responsavel }}">
        </div>
        <div class="form-group">
            <label for="data">Data*</label>
            <br>
            <input type="date" class="form-control" name="data" id="data" class="data" value="{{ $manutencaoImpressorasXavantes->data }}">
        </div>
        <div class="form-group">
            <label for="defeito">Descrição*</label>
            <input type="text" name="defeito" id="defeito" class="form-control" placeholder="Descrição do defeito..." value="{{ $manutencaoImpressorasXavantes->defeito }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor*</label>
            <input type="number" step=".01" class="form-control" name="valor" id="valor" placeholder="Valor da manutenção..." value="{{ $manutencaoImpressorasXavantes->valor }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Manutenção">
        <a href="/Suprimentos" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
