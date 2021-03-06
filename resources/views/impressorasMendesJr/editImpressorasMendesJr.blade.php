@extends('layouts.main')

@section('title', 'Editar Impressora')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/Impressoras" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Impressora</h1>
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
    <form action="/editImpressorasMendesJr/update/{{ $impressorasMendesJr->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo da Impressora*:</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo da Impressora..." value="{{ $impressorasMendesJr->modelo }}">
        </div>
        <div class="form-group">
            <label for="tonner">Tonner*</label>
            <input type="text" name="tonner" id="tonner" class="form-control" placeholder="Tonner compatível com esta Impressora..." value="{{ $impressorasMendesJr->tonner }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor da Impressora..." value="{{ $impressorasMendesJr->setor }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Impressora">
        <a href="/Impressoras" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
