@extends('layouts.main')

@section('title', 'Editar Impressora')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="/indexImpressora" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite a Impressora</h1>
    <hr>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/editImpressora/update/{{ $impressora->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo da Impressora*:</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo da Impressora..." value="{{ $impressora->modelo }}">
        </div>
        <div class="form-group">
            <label for="tonner">Tonner*</label>
            <input type="text" name="tonner" id="tonner" class="form-control" placeholder="Tonner compatível com esta Impressora..." value="{{ $impressora->tonner }}">
        </div>
        <div class="form-group">
            <label for="setor">Setor*</label>
            <input type="text" name="setor" id="setor" class="form-control" placeholder="Setor da Impressora..." value="{{ $impressora->setor }}">
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Editar Impressora">
        <a href="/indexImpressora" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
