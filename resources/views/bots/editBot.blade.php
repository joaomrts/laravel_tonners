@extends('layouts.main')

@section('title', 'Editar Bot')

@section('content')


<div id="events-create-container" class="col-md-10 offset-md-1">
    <br>
    <a href="{{ route('bots') }}" id="show" style="margin-right: 5px" class="btn btn-dark"><ion-icon name="arrow-back-outline"></ion-icon> Voltar</a>
    <h1>Edite o Bot</h1>
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
    <form action="{{ route('bots.edit.salvar', $bots->id) }}" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome_grupo">Nome do grupo:</label>
            <input type="text" class="form-control" name="nome_grupo" id="nome_grupo" placeholder="Nome do grupo" value="{{ $bots->nome_grupo }}">
        </div>
        <div class="form-group">
            <label for="bot_id">Bot ID:</label>
            <input type="text" name="bot_id" id="bot_id" class="form-control" placeholder="Id do Bot" value="{{ $bots->bot_id }}">
        </div>
        <div class="form-group">
            <label for="chat_id">Chat ID:</label>
            <input type="text" name="chat_id" id="chat_id" class="form-control" placeholder="Id do chat" value="{{ $bots->chat_id }}">
        </div>
        <br>
        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Salvar Bot">
        <a href="{{ route('bots') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>

@endsection
